<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class StudentsImport implements 
    ToModel, 
    WithHeadingRow, 
    SkipsEmptyRows,
    SkipsOnFailure
{
    use Importable, SkipsFailures;

    private $importedCount = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $nama = $row['nama'] ?? $row['name'] ?? null;
            $nis = $row['nis'] ?? $row['NIS'] ?? null;
            $kelas = $row['kelas'] ?? $row['class'] ?? null;

            // Skip jika nama kosong
            if (empty($nama)) {
                Log::warning('Skipping row - nama is empty', $row);
                return null;
            }

            // Validasi NIS unik
            if (!empty($nis)) {
                $nis = (string) $nis;
                $exists = Student::where('nis', $nis)->exists();
                if ($exists) {
                    Log::warning('Skipping row - NIS already exists: ' . $nis);
                    return null;
                }
            }

            // Simpan ke database
            $student = new Student();
            $student->nis = $nis;
            $student->name = $nama;
            $student->class = !empty($kelas) ? (string) $kelas : null;
            $student->save();

            $this->importedCount++;

            Log::info('Student Created:', [
                'id' => $student->id,
                'name' => $student->name,
                'nis' => $student->nis
            ]);

            return $student;

        } catch (\Throwable $e) {
            // Tangkap error baris dan masukkan ke failure
            Log::error('Import error at row', ['row' => $row, 'error' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Heading row number (baris pertama adalah header)
     */
    public function headingRow(): int
    {
        return 1;
    }

    /**
     * Get imported count
     */
    public function getImportedCount()
    {
        return $this->importedCount;
    }
}
