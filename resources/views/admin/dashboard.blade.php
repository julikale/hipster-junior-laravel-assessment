@extends('admin.layouts.app')

@section('content')
    <h1>Welcome, Admin</h1>

    <p>You are logged in as an administrator.</p>

    <hr>

    <h3>🟢 Online Admins</h3>
    @if($onlineAdmins->count())
        <ul>
            @foreach($onlineAdmins as $admin)
                <li>{{ $admin->name }} ({{ $admin->email }})</li>
            @endforeach
        </ul>
    @else
        <p>No admins online</p>
    @endif
    
    <hr>
    <h3>🟢 Online Customers</h3>
    @if($onlineCustomers->count())
        <ul>
            @foreach($onlineCustomers as $customer)
                <li>{{ $customer->name }} ({{ $customer->email }})</li>
            @endforeach
        </ul>
    @else
        <p>No customers online</p>
    @endif

    <hr>
    <div style="margin-top:20px;">
        <h3>Quick Actions</h3>
        <ul>
            <li>Manage Products</li>
            <li>View Online Users</li>
            <li>Import Products</li>
        </ul>
    </div>
@endsection
