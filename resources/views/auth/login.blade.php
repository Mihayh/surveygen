@extends('layouts.simple')
@section('content')
<div class="col-sm-4 col-sm-offset-4">
	<form action="{{ URL::route('login.post') }}" method="POST">
		{{ csrf_field() }}
		<h2 class="form-signin-heading">Please sign in</h2>
		<div class="form-group">
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
</div>
@stop