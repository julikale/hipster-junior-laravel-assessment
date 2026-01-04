<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <br>

    <div>
        <label>Password</label><br>
        <input type="password" name="password">
        @error('password')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <br>

    @if($errors->has('login_error'))
        <p style="color:red;">{{ $errors->first('login_error') }}</p>
    @endif

    <button type="submit">Login</button>
</form>

<p>
    Don’t have an account?
    <a href="{{ route('admin.register') }}">Register</a>
</p>

</body>
</html>
