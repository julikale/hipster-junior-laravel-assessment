<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
</head>
<body>

<h2>Admin Registration</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('admin.register') }}">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <br>

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

    <div>
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation">
    </div>
    <br>

    <button type="submit">Register</button>

</form>

<p>
    Already have an account?
    <a href="{{ route('admin.login') }}">Login</a>
</p>

</body>
</html>
