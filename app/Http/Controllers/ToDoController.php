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
        $id = Id::where('nid', $request->id)->exists();
        $nid = $request->id;
        if ($id) {
            $todos = Todo::where('nid', $nid)->get();
            return view('view', compact('todos'))->with('found', 'Id found, Data showing!');
        } else {
            return back()->with('notfound', 'ID not found, Try again or register new ID.');
        }
    }

    public function make_done($id)
    {
        $done = Todo::findOrFail($id);
        $nid = $done->nid;
        $done->status = 1;
        $done->save();
        $todos = Todo::where('nid', $nid)->get();
        return view('view', compact('todos'));

    }

    public function delete_todo($id)
    {
        $delete = Todo::findOrFail($id);
        $nid = $delete->nid;
        $delete->delete();
        $todos = Todo::where('nid', $nid)->get();
        return view('view', compact('todos'));
    }


}
