<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;

class TodoController extends Controller
{
    public function todo(){
        return view('todo');
    }

    public function createTodo(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()){
            return back()->withError($validator->errors());
        }
        $formFields  = [
            'title' => $request->title,
            'description' => $request->description,
            'is_complete' => $request->is_complete
        ];

        
        $todo = Todo::create($formFields);
        if($todo){
            return redirect('/')->with('success', "Event added successfully");
        }else{
            return back()->with('error', "Something went wrong");
        }
    }
}