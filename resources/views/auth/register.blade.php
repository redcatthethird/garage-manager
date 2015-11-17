@include ('head', ['title' => "Register"])

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
		{!! Form::hidden('isAdmin',false) !!}
		{!! Form::checkbox('isAdmin',true) !!}
        <!--input type="checkbox" name="isAdmin"-->
        Administrative account
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>

@include ('foot')