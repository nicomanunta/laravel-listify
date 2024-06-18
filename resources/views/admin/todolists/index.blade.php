@extends('layouts.style')

@section('content')
    <h1>To-Do Lists</h1>

    @foreach ($todolists as $list)
        <div>
            <h2>{{ $list->title }}</h2>
            <p>{{ $list->subtitle }}</p>
        </div>
    @endforeach
@endsection
