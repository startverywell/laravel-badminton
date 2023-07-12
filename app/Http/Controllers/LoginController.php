<?php
/**
 * @description : This is login controller.
 * @author :Uranus
 * @created date :2023-07-12 
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Level;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        $credentials1 = [
            'email' => $request->name,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else if (Auth::attempt($credentials1)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'name' => __('auth.no_user'),
        ]);
    }

    /**
     * Handle an register.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        $rules = [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];

        $customMessages = [
            'email.required' => __('auth.email.required'),
            'email.email' => __('auth.email.email'),
            'email.unique' => __('auth.email.unique'),
            'name.required' => __('auth.name.required'),
            'name.unique' => __('auth.name.unique'),
        ];

        // Validate the user's registration input
        $validatedData = $request->validate($rules, $customMessages);

        // Create a new User instance
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->level = $request->level;

        $point = Level::where('id', $request->level)->first();
        $user->point = $point->point;

        $user->save();
        return view('pages.auth.login');
    }

    public function login() 
    {
        return view('pages.auth.login');
    }

    public function register() 
    {
        $levels = Level::orderBy('id','asc')->get();
        return view('pages.auth.register', [
            'levels' => $levels
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return view('pages.auth.login');
    }

}
