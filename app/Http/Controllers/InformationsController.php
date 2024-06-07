<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function index() {
        return view("my-profile");
    }
}
