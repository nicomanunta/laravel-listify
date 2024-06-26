@extends('layouts.style')

@section('content')
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-12 py-3 ">
                <a class="position-fixed" href="{{route('admin.todolists.create')}}"><button class=" btn-create"><i class="fa-solid fa-plus"></i></button></a>
            </div>
        </div>
    </div>
</div>
<div class="mt-2">

    <h1 class=" h1-title font-archivo color-purple text-center text-uppercase">Le tue To-do List</h1>
</div>

    @foreach ($todolists as $todolist)
        
    @endforeach

    
    {{-- @foreach ($todolists as $todolist)
        <div>
            <h2>{{ $todolist->title }}</h2>
            <p>{{ $todolist->subtitle }}</p>
            <p>{{ $todolist->expiration_date }}</p>
            <p>{{ $todolist->priority }}</p>
            <a class="" href="{{route('admin.todolists.edit', ['todolist' => $todolist->id])}}"><button class=" "><i class="fa-solid fa-plus"></i></button></a>
        </div>
    @endforeach
    @foreach($todolist->tasks as $task)
        <li>{{ $task->description }}</li>
    @endforeach --}}
    
@endsection
