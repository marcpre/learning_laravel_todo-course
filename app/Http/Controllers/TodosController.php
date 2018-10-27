<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        
        $todos = Todo::all();
        
        return view('todos')->with('todos', $todos);
    }
    
    public function store(Request $request){
        
        $todo = new Todo;
        
        $todo->todo = $request->todo;
        
        $todo->save();
        
        // redirect user
        return redirect()->back();
    }
}
