<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $max_data = 3;

        if (request('search')) {
            $data = Todo::where('task', 'like', '%' . request('search') . '%')->paginate($max_data)->withQueryString();
        } else {
            $data = Todo::orderBy('task', 'asc')->paginate($max_data);
        }

        return view('ToDo.app', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:3|max:30'
        ], [
            'task.required' => 'input required',
            'task.min' => 'input at least 3 characters',
            'task.max' => 'maximum 30 characters',
        ]);

        $data = [
            'task' => $request->input('task')
        ];

        Todo::create($data);
        // return redirect('/todo')->with('success', 'Data created successfully');
        return redirect()->route('todo')->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|min:3|max:30'
        ], [
            'task.required' => 'input update required',
            'task.min' => 'input at least 3 characters',
            'task.max' => 'maximum 30 characters',
        ]);

        $data = [
            'task' => $request->input('task'),
            'is_done' => $request->input('is_done')
        ];

        Todo::where('id', $id)->update($data);

        return redirect()->route('todo')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::where('id', $id)->delete();

        return redirect()->route('todo')->with('success', 'Data deleted successfully');
    }
}
