<form method="POST" action="register">
    {!! csrf_field() !!}

    <div>
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <input type="checkbox" name="isAdmin">
        Administrative account
    </div>

    <div>
		<a href="{{ URL::route('logoutRoute') }}">Register</a>
    </div>
</form>