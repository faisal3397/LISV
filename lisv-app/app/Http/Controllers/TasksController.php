<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;
use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksController extends Controller
{

    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $currentDate = $date->format('Y m d H:i');
        $tasks = DB::table('tasks')->where('user_id', '=', auth()->id())->get();
        $carID = DB::table('cars')->where('user_id', '=', auth()->id())->first()->id;
        $car = Car::findOrFail($carID);
        foreach ($tasks as $task) {
            $taskTime = (new Carbon($task->date))->format('Y m d H:i');
            if($currentDate >= $taskTime){
                var_dump($task->taskname);
                switch($task->taskname){
                    case 'Open Doors':
                    $this->destroy($task->id);
                    $car->doors = 'Doors are Open';
                    $car->save();
                    break;

                    case 'Close Doors':
                    $this->destroy($task->id);
                    $car->doors = 'Doors are Closed';
                    $car->save();
                    break;

                    case 'Turn on':
                    $this->destroy($task->id);
                    $car->vehicle = 'Car is On';
                    $car->save();
                    break;

                    case 'Turn off':
                    $this->destroy($task->id);
                    $car->vehicle = 'Car is Off';
                    $car->save();
                    break;
                }
                
            }

                     
        }
        return view('tasks')->with("tasks", $tasks)->with("carStatus", $car);
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
        // $task->time = request('time');
        $task ->user_id = auth()->id();


        $task->save();

        return redirect('http://127.0.0.1:8000/tasks')->with("success", "Task Added");
    }

    public function update($id){

        $task = Task::findOrFail($id);

        $task->taskname = request('taskname');
        $task->date = request('date');
        // $task->time = request('time');

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

