<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        return view('template.pages.mentor.index');
    }
}
