<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
</head>
<body>

<h1>Customer Dashboard</h1>

<p>Welcome, you are logged in as a customer.</p>

<form method="POST" action="{{ route('customer.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>
