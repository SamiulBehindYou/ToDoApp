<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Id;
use App\Models\Todo;

class ToDoController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function create_id(Request $request)
    {
        $id = new Id();
        $id->name = $request->name;
        $id->nid = $request->id;
        $id->save();
        return back()->with('created', 'ToDo created successfully!');
    }

    public function create()
    {
        return view('create');
    }

    public function create_todo(Request $request)
    {
        $request->validate([
            'nid' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $id = Id::where('nid', $request->nid)->exists();
        if ($id) {
            $todo = new Todo();
            $todo->nid = $request->nid;
            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->save();
            return back()->with('created', 'Todo Created Successfully!');
        } else {
            return back()->with('notfound', 'ID not found, Try again or register new ID.');
        }

    }

    public function view_todo(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = Id::where('nid', $request->id)->first();
        $nid = $request->id;
        if ($id) {
            if($request->option == 1){
                $todos = Todo::where('nid', $nid)->where('trash', 0)->get();
            }
            elseif($request->option == 2){
                $todos = Todo::where('nid', $nid)->where('status', 1)->where('trash', 0)->get();
            }
            else{
                $todos = Todo::where('nid', $nid)->where('status', 0)->where('trash', 0)->get();
            }
            //Trash
            $trash = Todo::where('nid', $nid)->where('trash', 1)->get();
            $name = $id->name;
            $found = 'Id found, Data showing!';
            return view('view', compact('todos', 'trash', 'name', 'found'));
        } else {
            return back()->with('notfound', 'ID not found, Try again or register new ID.');
        }
    }

    public function make_done($id)
    {
        $done = Todo::findOrFail($id);
        $nid = $done->nid;
        $name = Id::where('nid', $nid)->first()->name;
        $done->status = 1;
        $done->save();
        $todos = Todo::where('nid', $nid)->where('trash', 0)->get();
        $trash = Todo::where('nid', $nid)->where('trash', 1)->get();
        $found = 'Todo done!';
        return view('view', compact('todos', 'trash', 'name', 'found'));

    }
    public function send_to_trash($id)
    {
        $done = Todo::findOrFail($id);
        $nid = $done->nid;
        $name = Id::where('nid', $nid)->first()->name;
        $done->trash = 1;
        $done->save();
        $todos = Todo::where('nid', $nid)->where('trash', 0)->get();
        $trash = Todo::where('nid', $nid)->where('trash', 1)->get();
        $found = 'Send to Trash!';
        return view('view', compact('todos', 'trash', 'name', 'found'));

    }

    public function delete_todo($id)
    {
        $delete = Todo::findOrFail($id);
        $nid = $delete->nid;
        $name = Id::where('nid', $nid)->first()->name;
        $delete->delete();
        $todos = Todo::where('nid', $nid)->where('trash', 0)->get();
        $trash = Todo::where('nid', $nid)->where('trash', 1)->get();
        $deleted = 'Todo deleted succssfully!';
        return view('view', compact('todos', 'trash', 'name', 'deleted'));
    }


}
