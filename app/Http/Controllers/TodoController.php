<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;

class TodoController extends Controller
{
    public function todo(){
        $todos = Todo::all();
        return view('todo', [
            'todos' => $todos
        ]);
    }

    public function createTodo(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            // dd($request->all());
            return redirect()->back()->withinput()->withErrors($validator->errors());
        }
        $formFields  = [
            'title' => $request->title,
            'description' => $request->description
        ];
        
        
        
        $todo = Todo::create($formFields);
        if($todo){
            return redirect('/')->with('success', "Event added successfully");
        }else{
            return redirect()->back()->with('error', "Something went wrong");
        }
    }

    public function getEvents(){
        $events = Todo::all();
        if($events){
            return view('welcome', [
                'events' => $events
            ]);
        }
    }

    public function editTodo($id){
        $event = Todo::all($id);
        return view('edit', [
            'event' => $event,
        ]);
    }
}