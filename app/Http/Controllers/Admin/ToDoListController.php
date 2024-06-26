<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreToDoListRequest;
use App\Http\Requests\UpdateToDoListRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\ToDoList;

use App\Models\User;
use App\Models\Label;
use App\Models\Task;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = ToDoList::where('user_id', auth()->id())->get();
        
        

        return view('admin.todolists.index',  compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();

        $labels = Label::all();
        
        $todolists = ToDoList::all();
        
        return view('admin.todolists.create', compact('users', 'labels', 'todolists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToDoListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToDoListRequest $request)
    {
        $form_data = $request->all();
        $todolist = new ToDoList();
        $slug = Str::slug($form_data['title'],'-');
        $form_data['slug'] = $slug;
        $todolist->user_id = auth()->user()->id;
        $todolist->fill($form_data);

        $todolist->save();

        foreach ($form_data['tasks'] as $task_data) {
            $task = new Task();
            $task->description = $task_data['description'];
            $task->status = false;
            $todolist->tasks()->save($task);
        }

        if($request->has('labels')){
            $todolist->labels()->attach($form_data['labels']);
        }

        return redirect()->route('admin.todolists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return \Illuminate\Http\Response
     */
    public function show(ToDoList $todolist)
    {
        $todolists = Todolist::all(); 
        $tasks = $todolist->tasks;
        return view('admin.todolists.show', compact('todolist','todolists', 'tasks'));

        
    
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDoList  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDoList $todolist)
    {
        $users= User::all();

        $labels = Label::all();
        $todolists = Todolist::all(); 
        
        return view('admin.todolists.edit', compact('todolist','users', 'labels', 'todolists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToDoListRequest  $request
     * @param  \App\Models\ToDoList  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToDoListRequest $request, ToDoList $todolist)
    {
        $form_data = $request->all();
        $slug = Str::slug($form_data['title'],'-');
        $form_data['slug'] = $slug;
        $todolist->update($form_data);
        $todolist->tasks()->delete();
        
        foreach ($form_data['tasks'] as $task_data) {
            $task = new Task();
            $task->description = $task_data['description'];
            $task->status = false;
            $todolist->tasks()->save($task);
        }

        if($request->has('labels')){
            $todolist->labels()->sync($form_data['labels']);
        }
        else{
            $todolist->labels()->sync([]);
        }

        return redirect()->route('admin.todolists.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDoList  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDoList $todolist)
    {
        $todolist->delete();

        return redirect('admin.todolists.index')->with('success', 'To-do list eliminata con successo');
    }
}
