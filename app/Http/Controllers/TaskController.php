<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $tasks = Task::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $tasks = Task::all();
        }

        return view('welcome', ['tasks' => $tasks, 'search' => $search]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {

        $task = new Task;

        $task->title = $request->title;
        $task->date = $request->date;
        $task->status = $request->status;
        $task->description = $request->description;

        $user = auth()->user();
        $task->user_id = $user->id;

        $task->save();

        return redirect('/')->with('msg', 'Tarefa criada com sucesso!');
    }

    public function show($id) {

        $task = Task::findOrFail($id);

        $taskOwner = User::where('id', $task->user_id)->first()->toArray();
        
        return view('tasks.show', ['task' => $task, 'taskOwner' => $taskOwner]);

    }

    public function dashboard() {

        $user = auth()->user();

        $tasks = $user->tasks;

        return view('tasks.dashboard', ['tasks' => $tasks]);

    }

    public function destroy($id) {

        Task::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Tarefa excluída com sucesso!');

    }

    public function edit($id) {

        $user = auth()->user();

        $task = Task::findOrFail($id);

        if($user->id != $task->user_id) {
            return redirect('/dashboard');
        }

        return view('tasks.edit', ['task' => $task]);

    }

    public function update(Request $request) {
        
        Task::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard')->with('msg', 'Tarefa editada com sucesso!');
    }

    public function joinTask($id) {

        $user = auth()->user();

        $user->tasksAsOwner()->attach($id);

        $task = Task::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Confirmação a tarefa realizado com sucesso!');

    }
}

