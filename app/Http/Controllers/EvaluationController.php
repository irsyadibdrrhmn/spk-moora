<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Criteria;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('evaluations.criteria')->get();
        $criteria = Criteria::all();
        return view('evaluations.index', compact('students','criteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $criteria = Criteria::all();
        return view('evaluations.create', compact('students','criteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|exists:students,id',
            'scores'      => 'required|array',
        ]);

        foreach($request->scores as $criteria_id => $score){
            Evaluation::updateOrCreate(
                ['student_id'=>$request->student_id, 'criteria_id'=>$criteria_id],
                ['score'=>$score]
            );
        }

        return redirect()->route('evaluations.index')->with('success','Nilai berhasil disimpan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return redirect()->route('evaluations.index')->with('success','Nilai berhasil dihapus');
    }
}
