<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
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
        
        Session::flash('success', 'Your todo was created.');
        
        // redirect user
        return redirect()->back();
    }
    
    public function delete($id) {
        
        // dd($id);
        
        $todo = Todo::find($id);
        
        $todo->delete();

        Session::flash('success', 'Your todo was deleted.');
    
        return redirect()->back();
    }
    
    public function update($id) {
        $todo = Todo::find($id);
    
        Session::flash('success', 'Your todo was updated.');

        return view('update')->with('todo', $todo);
    }
    
    public function save(Request $request, $id) {
        
        // dd($request);
        
        $todo = Todo::find($id);
        
        $todo->todo = $request->todo;
        
        $todo->save();
    
        return redirect()->route('todos');
    }
    
    public function completed($id) {
        $todo = Todo::find($id);
    
        $todo->completed = 1;
        
        $todo->save();
    
        Session::flash('success', 'Your todo was marked as completed.');
    
        return redirect()->back();
    }

}