<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class classroomsController extends Controller
{
    public function index(Request $request)
    {
        
        return view(
            'index',
            [
                'name' => 'aya',
                
            ]
        );
    }
    public function create()
    {
        return view('create');
    }
}
