<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $onlineAdmins = Admin::where('is_online', true)->get();
        $onlineCustomers = Customer::where('is_online', true)->get();

        return view('admin.dashboard', compact(
            'onlineAdmins',
            'onlineCustomers'
        ));
    }
}
