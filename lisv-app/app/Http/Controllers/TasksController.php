<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TasksController extends Controller
{

    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $tasks = Task::all();
        var_dump(" ".$date->format('H:i')." format");
        foreach ($tasks as $task) {
            // var_dump($task->time." task time");
            var_dump(" ".$date->format('H:i') > ($task->time));
            if($date->format('H:i') > ($task->time)){
                
                switch($task->taskname){
                    case 'Open Doors':
                    $this->destroy($task->id);
                    return view('tasks')->with("tasks", $tasks)->with("status","Doors are Open");
                    break;

                    case 'Close Doors':
                    $this->destroy($task->id);
                    return view('tasks')->with("tasks", $tasks)->with("status","Doors are Closed");
                    break;

                    case 'Turn on':
                    $this->destroy($task->id);
                    return view('tasks')->with("tasks", $tasks)->with("status","Car is On");
                    break;

                    case 'Turn off':
                    $this->destroy($task->id);
                    return view('tasks')->with("tasks", $tasks)->with("status","Car is Off");
                    break;
                }
                
            }

                     
        }
        return view('tasks')->with("tasks", $tasks)->with("status");
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

