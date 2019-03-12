<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    //
    public function show(){

        $tasks = Task::all();

        return view('tasks')->with("tasks", $tasks);
    } 


    public function store(){
        $this->validate(request(), [

            'taskname' => 'required',

        ]
    );
        // Create and save the Task 

        $task = new Task;
        
        $task->taskname = request('taskname');

        $task->time = request('time');


        $task->save();

        return redirect('http://127.0.0.1:8000/tasks')->with("success", "Task Added");
    }

    public function update($id){

        $task = Task::findOrFail($id);

        $task->taskname = request('taskname');

        $task->time = request('time');


        $task->save();

        return redirect('http://127.0.0.1:8000/tasks')->with("success", "Task Updated");
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect('http://127.0.0.1:8000/tasks');
    }
}

