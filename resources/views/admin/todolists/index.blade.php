@extends('layouts.style')

@section('content')
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-4">
                <a class="position-fixed" href="{{route('admin.todolists.create')}}"><button class=" btn-create"><i class="fa-solid fa-plus"></i></button></a>
            </div>
        </div>
    </div>
</div>
<div class="mt-3">

    <h1 class=" h1-title font-archivo color-purple text-center text-uppercase">Le tue To-do List</h1>
</div>
    
    @foreach ($todolists as $list)
        <div>
            <h2>{{ $list->title }}</h2>
            <p>{{ $list->subtitle }}</p>
            
        </div>
    @endforeach
@endsection
