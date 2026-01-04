<!DOCTYPE html>
<html>
<head>
    <title>Customer Register</title>
</head>
<body>

<h2>Customer Registration</h2>

<form method="POST" action="{{ route('customer.register') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    @error('name') <p style="color:red;">{{ $message }}</p> @enderror

    <br><br>

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email') <p style="color:red;">{{ $message }}</p> @enderror

    <br><br>

    <input type="password" name="password" placeholder="Password">
    @error('password') <p style="color:red;">{{ $message }}</p> @enderror

    <br><br>

    <input type="password" name="password_confirmation" placeholder="Confirm Password">

    <br><br>

    <button type="submit">Register</button>
</form>

<p>
    Already have an account?
    <a href="{{ route('customer.login') }}">Login</a>
</p>

</body>
</html>
