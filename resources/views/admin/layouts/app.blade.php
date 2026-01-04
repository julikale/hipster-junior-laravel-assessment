<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #fff;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            padding: 12px 15px;
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .logout-btn {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 12px 15px;
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    @include('admin.partials.sidebar')

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
