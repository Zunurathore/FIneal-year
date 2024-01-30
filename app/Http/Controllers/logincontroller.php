<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
    public function pmologin(Request $request)
    {
        $emaill = 'user@example.com'; // Replace with actual email
        $rolee = '1'; // Replace with actual role
        session(['email' => $emaill, 'role' => $rolee]);
        return redirect(route('PMO.home'));

    } 
    public function supervisorlogin(Request $request)
    {
        $emaill = 'user@example.com'; // Replace with actual email
        $rolee = '2'; // Replace with actual role
        session(['email' => $emaill, 'role' => $rolee]);
        return redirect(route('Superviser.home'));       
    } 
    public function grouplogin(Request $request)
    {
        $emaill = 'user@example.com'; // Replace with actual email
        $rolee = '3'; // Replace with actual role
        session(['email' => $emaill, 'role' => $rolee]);
        return redirect(route('Student.home'));
    } 
        
}
