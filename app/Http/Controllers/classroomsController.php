<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class classroomsController extends Controller
{
    public function index(Request $request): Renderable
    {
        // return response : view , redirect , json-data , file , String
        // return 'Hello World!';

        $classrooms = Classroom::orderBy('Created_at', 'AYA')->get(); 
        $success = session('success');


        return view('classrooms.index', compact('classrooms', 'success'));




    }
    public function create()
    {
        return view('classrooms.create');
    }


    public function store(Request $request): RedirectResponse
    {


        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image'); 
            $path = $file->store('/covers', 'Public'); 
            $request->merge([
                'cover_image_path' => $path,
            ]);
        }

        
        $request->merge([
            'code' => Str::random(6)
        ]); 
        $classroom = Classroom::create($request->all());

       
        return redirect()->route('classrooms.index');
    }
    public function show($id)
    {
        // $classroom = classroom::where('id' , '=' , $id)->first();
        $classroom = Classroom::findOrFail($id);

        return view('classrooms.show')
            ->with([
                'classroom' => $classroom,
            ]);
    }

    public function edit($id)
    {
        $classroom = Classroom::find($id);
        return view('classrooms.edit', [
            'classroom' => $classroom
        ]);
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);
        // $classroom->name = $request->post('name');
        // $classroom->section = $request->post('section');
        // $classroom->subject = $request->post('subject');
        // $classroom->room = $request->post('room');
        // $classroom->code = Str::random(6);
        // $classroom->save(); //update

        // Mass assignment
        $classroom->update($request->all());

     

        return Redirect::route('classrooms.index')
            ->with('success', 'Classroom updated');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->destroy($id);

        

        return redirect(route('classrooms.index'))->with('success', 'Classroom deleted');
    }
}
