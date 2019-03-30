<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksController extends Controller
{

    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $tasks = DB::table('tasks')->where('user_id', '=', auth()->id())->get();
        foreach ($tasks as $task) {
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
        $task->date = request('date');
        $task->time = request('time');
        $task ->user_id = auth()->id();


        $task->save();

        return redirect('http://127.0.0.1:8000/tasks')->with("success", "Task Added");
    }

    public function update($id){

        $task = Task::findOrFail($id);

        $task->taskname = request('taskname');
        $task->date = request('date');
        $task->time = request('time');

        $task ->user_id = auth()->id();


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

