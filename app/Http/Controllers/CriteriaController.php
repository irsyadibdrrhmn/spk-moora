<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criteria = Criteria::all();
        return view('criteria.index', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'   => 'required|unique:criteria',
            'name'   => 'required',
            'type'   => 'required|in:benefit,cost',
            'weight' => 'required|numeric',
        ]);

        Criteria::create($request->all());
        return redirect()->route('criteria.index')->with('success','Kriteria berhasil ditambahkan');
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
    public function edit(Criteria $criterion)
    {
        return view('criteria.edit', compact('criterion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criteria $criterion)
    {
        $request->validate([
            'code'   => 'required|unique:criteria,code,'.$criterion->id,
            'name'   => 'required',
            'type'   => 'required|in:benefit,cost',
            'weight' => 'required|numeric',
        ]);

        $criterion->update($request->all());
        return redirect()->route('criteria.index')->with('success','Kriteria berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criterion)
    {
        $criterion->delete();
        return redirect()->route('criteria.index')->with('success','Kriteria berhasil dihapus');
    }
}
