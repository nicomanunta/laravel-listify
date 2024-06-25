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
    
    @foreach ($todolists as $list)
        <div>
            <h2>{{ $list->title }}</h2>
            <p>{{ $list->subtitle }}</p>
            <p>{{ $list->expiration_date }}</p>
            <p>{{ $list->priority }}</p>
            
        </div>
    @endforeach
    @foreach($list->tasks as $task)
        <li>{{ $task->description }}</li>
    @endforeach
    
@endsection
