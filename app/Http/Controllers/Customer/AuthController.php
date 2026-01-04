<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* Show Register */
    public function showRegister()
    {
        return view('customer.auth.register');
    }

    /* Handle Register */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6|confirmed',
        ]);

        Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('customer.login')
            ->with('success', 'Account created successfully. Please login.');
    }

    /* Show Login */
    public function showLogin()
    {
        return view('customer.auth.login');
    }

    /* Handle Login */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('customer')->attempt(
            $request->only('email', 'password')
        )) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors([
            'login_error' => 'Invalid email or password',
        ])->withInput($request->only('email'));
    }

    /* Logout */
    public function logout()
    {
        Auth::guard('customer')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('customer.login');
    }
}
