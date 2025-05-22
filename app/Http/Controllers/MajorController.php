<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    public function create()
    {
        return view('majors.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:50',
        'description' => 'required|string',
    ]);

    Majors::create($validated);

    return redirect()->route('majors.index')->with('success', 'Major created successfully.');
}


    public function show(Majors $major)
    {
        return view('majors.detail', compact('major'));
    }

    public function edit(Majors $major)
    {
        return view('majors.update', compact('major'));
    }

    public function update(Request $request, Majors $major)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $major->update($request->only('name'));

        return redirect()->route('majors.index')->with('success', 'Major updated!');
    }

    public function destroy(Majors $major)
    {
        $major->delete();
        return redirect()->route('majors.index')->with('success', 'Major deleted!');
    }

}

