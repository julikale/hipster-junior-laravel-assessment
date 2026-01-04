<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
</head>
<body>

<h2>Customer Login</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('customer.login') }}">
    @csrf

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email') <p style="color:red;">{{ $message }}</p> @enderror

    <br><br>

    <input type="password" name="password" placeholder="Password">
    @error('password') <p style="color:red;">{{ $message }}</p> @enderror

    @if($errors->has('login_error'))
        <p style="color:red;">{{ $errors->first('login_error') }}</p>
    @endif

    <br><br>

    <button type="submit">Login</button>
</form>

<p>
    New customer?
    <a href="{{ route('customer.register') }}">Register</a>
</p>

</body>
</html>
