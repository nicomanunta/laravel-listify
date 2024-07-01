@extends('layouts.style')

@section('content')
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-12 py-3 ">
                <a class="position-fixed z-1" href="{{route('admin.todolists.create')}}"><button class=" btn-create"><i class="fa-solid fa-plus"></i></button></a>
            </div>
        </div>
    </div>
</div>
<div class="mt-2">

    <h1 class=" h1-title font-archivo color-purple text-center text-uppercase">Le tue To-do List</h1>
</div>
    <div class="container">
        <form action="{{route('admin.todolists.index')}}" method="get">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="btn-accordion text-start   mb-3 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="underline font-archivo ms-3 font-hover">Filtra e Ordina </span> 
                                </button>
                            </h2>
                            <div class="row ">
                                <div id="collapseOne" class="accordion-collapse collapse  bg-color-grey d-flex" data-bs-parent="#accordionExample">
                                    <div class="col-3">
                                        <select name="priority" class="form-control select-todolist">
                                            <option value="">Filtra per etichetta</option>
                                            <option value="Urgente" >Urgente</option>
                                            <option value="Alta">Alta</option>
                                            <option value="Media">Media</option>
                                            <option value="Bassa" >Bassa</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select name="priority" class="form-control select-todolist">
                                            <option value="">Filtra per Priorità</option>
                                            <option value="Urgente" >Urgente</option>
                                            <option value="Alta" >Alta</option>
                                            <option value="Media" >Media</option>
                                            <option value="Bassa" >Bassa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($todolists as $todolist)
                <div class="col-3 mt-5 mb-2">
                    <a class="text-decoration-none link-card h-100" href="{{route('admin.todolists.show', ['todolist' => $todolist->id])}}">

                        <div class="card card-index d-flex bg-color-purple justify-content-between h-100" >
                            <div class="card-body h-100">
                                <h5 class="card-title mt-1  color-yellow text-center text-uppercase "><span class="underline font-archivo">{{ $todolist->title }}</span></h5>
                                <h6 class="card-subtitle pt-3 font-archivo text-center">{{ $todolist->subtitle }}</h6>
                                <p class="card-text pt-1">
                                    <div class="text-center">Priorità:
                                        <span class="font-archivo text-uppercase" 
                                            @if ($todolist->priority == 'Urgente')
                                                style= 'color: red!important; text-shadow: 2px 2px rgba(255, 0, 0, 0.363)!important;'
                                            @elseif ($todolist->priority == 'Alta')
                                                style= 'color: orange!important; text-shadow: 2px 2px rgba(255, 166, 0, 0.363)!important;'
                                            @elseif ($todolist->priority == 'Media')
                                                style= 'color: yellow!important; text-shadow: 2px 2px rgba(255, 255, 0, 0.363)!important;'
                                            @elseif ($todolist->priority == 'Bassa')
                                                style= 'color: limegreen!important; text-shadow: 2px 2px rgba(50, 205, 50, 0.363)!important;' 
                                            @endif> 
                                            @if (empty($todolist->priority))
                                                <span class="font-archivo" style= 'color: limegreen!important; text-shadow: 2px 2px rgba(50, 205, 50, 0.363)!important;'>Bassa</span>
                                            @else
                                                {{ $todolist->priority }}   
                                            @endif
                                                
                                        </span>
                                    </div>
                                    @if (empty($todolist->expiration_date))
                                        <span></span>
                                    @else
                                        <div class="mt-1 text-center">Termine: <span class="font-archivo ">{{ \Carbon\Carbon::parse($todolist->expiration_date)->format('d-m-Y') }}</span></div>   
                                    @endif
                                    
                                </p>
                                <div class="mt-4 text-center">
                                    @forelse ($todolist->labels as $label)
                                        <span class="badge badge-index text-bg-secondary mx-1 mb-1"  style="background-color: {{$label->label_color}} !important; text-shadow: 2px 2px #00000020;">{{$label->label_name}}</span></label>                                  
                                    @empty
                                        <span class=" pt-4">Nessuna etichetta presente</span>
                                    @endforelse ($todolist->labels as $label)  
                                        
                                </div>
                                
                                
                            </div>
                            <div class="d-flex text-center bg-color-purple border-radius-bottom border-yellow">
                                <a class="col-6 text-center btn-edit" href="{{route('admin.todolists.edit', ['todolist' => $todolist->id])}}">
                                    <i class="fa-solid fa-pencil pencil"></i>
                                </a>
                                
                                <button class=" btn-delete col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $todolist->id }}"><i class="fa-solid fa-trash cestino"></i></button>
                               
                            </div>
                        </div>
                    </a>
                    
                </div>
            @endforeach

        </div>
    </div>
    @foreach ($todolists as $todolist)
        @include('admin.todolists.partials.modal_delete', ['todolist_id' => $todolist->id])
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
