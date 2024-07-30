<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
 // Afficher la liste des tâches
 public function index()
 {
     $tasks = Task::all();
     return view('tasks.index', compact('tasks'));
 }

 // Afficher le formulaire de création d'une nouvelle tâche
//  public function create()
//  {
//      return view('tasks.create');
//  }

//  // Enregistrer une nouvelle tâche
//  public function store(Request $request)
//  {
//      $request->validate([
//          'title' => 'required|string|max:255',
//          'description' => 'nullable|string',
//          'status' => 'required|in:pending,in_progress,completed',
//      ]);

//      Task::create($request->all());

//      return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
//  }

//  // Afficher une tâche spécifique
//  public function show(Task $task)
//  {
//      return view('tasks.show', compact('task'));
//  }

//  // Afficher le formulaire d'édition d'une tâche
//  public function edit(Task $task)
//  {
//      return view('tasks.edit', compact('task'));
//  }

//  // Mettre à jour une tâche
//  public function update(Request $request, Task $task)
//  {
//      $request->validate([
//          'title' => 'required|string|max:255',
//          'description' => 'nullable|string',
//          'status' => 'required|in:pending,in_progress,completed',
//      ]);

//      $task->update($request->all());

//      return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
//  }

 // Supprimer une tâche
 public function destroy(Task $task)
 {
     $task->delete();

     return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
 }}
