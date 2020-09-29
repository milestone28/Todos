<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todo $todos)
    {
        //


      return view('todos.index')->with('todos' ,$todos::all()->sortDesc());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|unique:todos|max:25|min:4',
            'description' => 'required'
        ]);


       $data = new Todo;

       $data->name = $request['name'];
       $data->description = $request['description'];
       $data->completed = false;
       $data->save();

      return redirect('todos')->with('status', 'Todo Successfully Created !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
      //  $todo = Todo::Find($id);
        return view('todos.show')->with('todo', $todo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        return view('todos.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'name' => 'required|max:25|min:4',
            'description' => 'required'
        ]);

        $data = new Todo;

        $data->name = $request['name'];
        $data->description = $request['description'];
        $data->completed = false;
        $data->save();

       return redirect('todos')->with('status', 'Todo Successfully Updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();

        return redirect('/todos')->with('status', 'Todo Successfully Deleted !');
    }


    public function completed(Todo $todo){

        $todo->completed = true;
        $todo->save();

        return redirect('/todos')->with('status', 'Todo Successfully Completed !');

    }

}
