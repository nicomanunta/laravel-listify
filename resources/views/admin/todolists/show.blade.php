@extends('layouts.style')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-center font-archivo color-yellow h1-title text-uppercase mt-3">{{$todolist->title}}</h1>
            <h2 class="h2-subtitle text-center color-purple ">{{$todolist->subtitle}}</h2>
        </div>
        <div class="row justify-content-center">

            <div class="col-9">
                <ul class="navbar-nav mt-5">
                    @foreach ($todolist->tasks as $task)
                        <li class="mb-3"> 
                            <div class="btn-group w-100 " role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check btn-check-description w-100" id="btncheck{{$task->id}}" autocomplete="off">
                                <label class="btn btn-outline-primary w-100 text-start label-description" for="btncheck{{$task->id}}"> {{ ucfirst($task->description)}}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div>Priorità:
                <span class="font-archivo " 
                    @if ($todolist->priority == 'Urgente')
                        style="color: red!important; text-shadow: 2px 2px rgba(255, 0, 0, 0.363)!important;"    
                    @elseif($todolist->priority == 'Alta')
                        style="color: orange!important; text-shadow: 2px 2px rgba(255, 166, 0, 0.363)!important;"
                    @elseif($todolist->priority == 'Media')
                        style="color: yellow!important; text-shadow: 2px 2px rgba(255, 255, 0, 0.363)!important;"
                    @elseif($todolist->priority == 'Bassa')
                        style="color: limegreen!important; text-shadow: 2px 2px rgba(50, 205, 50, 0.363)!important;"  
                    @endif>
                    @if (empty($todolist->priority))
                        <span class="font-archivo" style= 'color: limegreen!important; text-shadow: 2px 2px rgba(50, 205, 50, 0.363)!important;'>Bassa</span>
                    @else
                        {{$todolist->priority}}
                    @endif
                </span> 
            </div>
        </div>
        <div class="col-12 mt-5">
            @forelse ($todolist->labels as $label)
                <span class="badge badge-create text-bg-secondary mx-1 mb-1"  style="background-color: {{$label->label_color}} !important; text-shadow: 2px 2px #00000020;">{{$label->label_name}}</span></label>
            @empty
                <span class="color-purple font-archivo">Nessuna etichetta presente</span>
            @endforelse
        </div>
    </div>
   
</div>



@foreach ($todolists as $todolist)
    @include('admin.todolists.partials.modal_delete', ['todolist_id' => $todolist->id])
@endforeach
@endsection
