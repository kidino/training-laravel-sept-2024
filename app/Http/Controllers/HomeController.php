<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($name = 'Saudara', $age = 'unknown') {
        return view('home', compact('name', 'age'));
    }

    public function apply() {


    }

    public function approve() {

    }

    public function verify() {
        


    }
}
