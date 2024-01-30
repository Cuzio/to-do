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
        $event = Todo::find($id);
        return view('edit', [
            'event' => $event,
        ]);
    }

    public function updateTodo(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $formFields = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        $update = Todo::where('id', $id)->update($formFields);

        if($update){
            return redirect('/')->with('success', 'Successfully updated');
        }else{
            return redirect()->back()->with('error', 'Error updating');
        }
    }

    public function deleteTodo($id){
        $deletePost = Todo::where('id', $id)->delete();
        if($deletePost){
            return redirect('/')->with('success', 'Successfully deleted');
        }else{
            return redirect()->back()->with('error', 'Error deleting');
        }
    }
}