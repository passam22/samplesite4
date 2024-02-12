<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public function login_form()
    {
        //Display Form
        return view("login_form");
    }

    public function check_login_manual(Request $request)
    {
        //Authenticate Employee
        $info = User::where('email', $request->input('email'))->first();

        if ($info) //IF CORRECT EMAIL
        {            
            if (Hash::check($request->input('password'), $info->password)) //IF CORRECT PASSWORD
            {
                return redirect('/dashboard');
            }
            
        }
        
        //IF WRONG EMIAL/ PASSWORD
        return redirect('/login_form')->with('error', 'Wrong Email or Password');
    }

    public function check_login(Request $request)
    {
        $credentials = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        );

                 
        if (Auth::attempt($credentials))
        {
            return redirect('/dashboard');
        }
            
       
        
        //IF WRONG EMIAL/ PASSWORD
        return redirect('/login_form')->with('error', 'Wrong Email or Password');
    }

    public function register_form()
    {
        //Display Registration Form
        return view("register_form");
    }

    public function register_employee(Request $request)
    {
        //Add New Employee
        if($request->input("password")!=$request->input("confirm_password"))
        {
            return redirect("/register_form")->with('error', 'Incorrect password confirmation');
        }

        $record = array(
            'employee_name' => $request->input('employee_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        );

        User::create($record);
        return redirect("/login_form")->with('success', 'Account successfully created');        
    }

    public function output_hash($str)
    {
        echo bcrypt($str)."<br/>";
        echo Hash::make($str)."<br/>";
    }

    public function dashboard(Request $request)
    {
        $data = array(
            'info' => $request->user(), //retrieves the currently login user info
        );

        return view("dashboard", $data);
    }

    public function sample_link(Request $request)
    {        

        return view("sample_link");
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login_form');
    }
}
