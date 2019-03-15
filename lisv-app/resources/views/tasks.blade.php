<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Tasks</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
					@if(count($errors)>0)
					<div class= "alert alert-danger">
						You did not chooes a task.
					</div>
				@endif


				@if(session('success'))
					<div class= "alert alert-success">
						{{session('success')}}
					</div>
				@endif
				
				@if($status != null)
				<div class= "alert alert-success">
					{{$status}}
				</div>
				@endif

				@if(count($tasks)>0)
				@foreach($tasks as $task)
					<div>
						Task: {{$task->taskname}}
						<br>
						Time: {{$task->time}}
						<br>
						<form method="POST" action="{{ route('tasks.destroy', [$task->id]) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit">Delete</button>
								@include('partials.errors')
						</form>

						<form method="POST" action="{{ route('tasks.update', [$task->id]) }}">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
										  <input type="radio" name="taskname" id="option1" autocomplete="off" value="Open Doors"> Open Doors
										</label>
										<label class="btn btn-secondary">
											 <input type="radio" name="taskname" id="option2" autocomplete="off" value="Close Doors"> Close Doors
										</label>
										<label class="btn btn-secondary">
											  <input type="radio" name="taskname" id="option3" autocomplete="off" value="Turn on"> Turn on
										</label>
									  <label class="btn btn-secondary">
											  <input type="radio" name="taskname" id="option3" autocomplete="off" value="Turn off"> Turn off
										</label>
								  </div>
								  <br>
								  					
								<div class="wrap-input100 ">
										<input class="input100" type="time" name="time" placeholder="Time" id="time">
										<span class="focus-input100-1"></span>
										<span class="focus-input100-2"></span>
									</div>
	
								<button type="submit">Edit</button>
								@include('partials.errors')
						</form>
					</div>

					<br>
				@endforeach
			@endif

			
				<form class="login100-form validate-form" method="POST" action="/tasks">

					{{ csrf_field() }}

					<span class="login100-form-title p-b-33">
						Tasks		
					</span>




					Task:
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
  						<label class="btn btn-secondary active">
    						<input type="radio" name="taskname" id="option1" autocomplete="off" value="Open Doors"> Open Doors
  						</label>
  						<label class="btn btn-secondary">
   							<input type="radio" name="taskname" id="option2" autocomplete="off" value="Close Doors"> Close Doors
  						</label>
  						<label class="btn btn-secondary">
   	 						<input type="radio" name="taskname" id="option3" autocomplete="off" value="Turn on"> Turn on
  						</label>
						<label class="btn btn-secondary">
   	 						<input type="radio" name="taskname" id="option3" autocomplete="off" value="Turn off"> Turn off
  						</label>
					</div>
					<br>
					
					Time:
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid Time is required">
						<input class="input100" type="time" name="time" placeholder="Time" id="time">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Enter Task
						</button>
					</div>
					<br>
				</form>
			</div>
		</div>
	</div>
	

	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>

	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>

	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>

	
	<!-- bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html> 