<?php

namespace App\Http\Controllers;
use App\Models\Files;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        $files = Files::all();
        return view('homepage',compact('files'));
    }
}
