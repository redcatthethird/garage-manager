@include ('head', ['title' => "Login"])

<form method="POST" action="login">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
	<div>
        <a href="{{ URL::route('resetRoute') }}">Forgot password?</a>
    </div>
</form>

@include ('foot')