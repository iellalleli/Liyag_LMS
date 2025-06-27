<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\User;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklists = Checklist::with('user')->latest()->get();
        return view('checklists.index', compact('checklists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // For assigning to users
        return view('checklists.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string|max:255',
        ]);

        Checklist::create([
            'user_id' => $request->user_id,
            'task' => $request->task,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('checklists.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('checklists.show', compact('checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        return view('checklists.edit', compact('checklist', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string|max:255',
        ]);

        $checklist = Checklist::findOrFail($id);
        $checklist->update([
            'user_id' => $request->user_id,
            'task' => $request->task,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('checklists.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->delete();
        return redirect()->route('checklists.index')->with('success', 'Task deleted successfully.');
    }
}
