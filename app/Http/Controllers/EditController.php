<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index(Request $request , $id ,$dark = false)
{
    return view('Edit')
    ->with([ 
        'id' => $id,
        'dark' => $dark,
    ]);
}
}
