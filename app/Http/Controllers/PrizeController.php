<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function index()
    {
    
        $text = "Hello Cruel World";
        return view('promo', ['text' => $text]);
    } 
}
