<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;
use App\Models\todo;

class TodoController extends Controller
{
    public function index()
    {
        $todolist = todo::all();

        return view('home.todo', compact('todolist'));
    }

    public function store(StoretodoRequest $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'max:200',

            // NULL artinya tidak ada aturan baku mengenai tenggat
            // Boleh kosong atau tidak di isi
            'end_at' => '',
            ]);

        todo::create($data);

        return back();
    }

    public function update(UpdatetodoRequest $request, todo $todo, $id)
    {
        $data = Todo::find($id);
        $check = $request->validate([
            'title' => 'required',
        ]);

        $input = $request->all();
        if ($check) {
            $data->fill($input)->save();

            return back();
        } else {
            return back()->withInput()->withErrors($check);
        }
    }

    public function destroy(todo $todo, $id)
    {
        $data = Todo::find($id);
        $data->delete();

        return back();
    }

    public function getData($id)
    {
        $data = Todo::findOrFail($id);

        return response()->json($data);
    }
}