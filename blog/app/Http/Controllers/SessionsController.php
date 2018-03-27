<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create(){

        return view('sessions.create');
    }

    public function destroy(){

        auth()->logout();

        return redirect()->home();

    }

    public function store(){

        //attempt to authenticate a user

        if (! auth()->attempt(\request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }


        return redirect()->home();

        //if so sign them in

        //redirect to home

        //if not redirect to login


    }

}
