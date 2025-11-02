<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'nullable|unique:students',
            'name' => 'required',
            'class' => 'nullable',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success','Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'nullable|unique:students,nis,'.$student->id,
            'name' => 'required',
            'class' => 'nullable',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Data siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Data siswa berhasil dihapus');
    }

    /**
     * Show import form
     */
    public function importForm()
    {
        return view('students.import');
    }

    /**
     * Import data from Excel
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ], [
            'file.required' => 'File harus dipilih',
            'file.mimes' => 'File harus berformat Excel (xlsx, xls) atau CSV',
            'file.max' => 'Ukuran file maksimal 2MB'
        ]);

        try {
            // Hitung jumlah data sebelum import
            $countBefore = Student::count();
            \Log::info('Student count before import: ' . $countBefore);

            $import = new StudentsImport();
            Excel::import($import, $request->file('file'));

            // Hitung jumlah data setelah import
            $countAfter = Student::count();
            $imported = $countAfter - $countBefore;
            \Log::info('Student count after import: ' . $countAfter);
            \Log::info('Total imported: ' . $imported);

            // Check if there are any failures
            $failures = $import->failures();
            
            if ($failures->isNotEmpty()) {
                $errorMessages = [];
                foreach ($failures as $failure) {
                    $errorMessages[] = "Baris {$failure->row()}: " . implode(', ', $failure->errors());
                }
                
                return redirect()->route('students.index')
                    ->with('warning', "Import selesai. Berhasil: {$imported} siswa. Error: " . implode(' | ', $errorMessages));
            }

            if ($imported == 0) {
                return redirect()->route('students.index')
                    ->with('warning', 'Tidak ada data yang diimport. Periksa format file Excel Anda.');
            }

            return redirect()->route('students.index')
                ->with('success', "Berhasil import {$imported} data siswa!");

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];
            foreach ($failures as $failure) {
                $errorMessages[] = "Baris {$failure->row()}: " . implode(', ', $failure->errors());
            }
            
            \Log::error('Import validation failed:', $errorMessages);
            
            return redirect()->route('students.index')
                ->with('error', 'Validasi gagal: ' . implode(' | ', $errorMessages));
                
        } catch (\Exception $e) {
            \Log::error('Import exception: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->route('students.index')
                ->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    /**
     * Download template Excel
     */
    public function downloadTemplate()
    {
        $filePath = public_path('templates/template_import_siswa.xlsx');
        
        if (!file_exists($filePath)) {
            return redirect()->route('students.index')
                ->with('error', 'Template file tidak ditemukan.');
        }

        return response()->download($filePath, 'Template_Import_Siswa.xlsx');
    }
}