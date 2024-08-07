@extends('layouts.style')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-uppercase font-archivo h1-title color-purple text-center mt-3 ">Crea una nuova To-do List</h1>
        </div>
        <div class="col-12">
            <form action="{{route('admin.todolists.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TABELLA TODOLISTS --}}
                <div class="form-group my-3">
                    <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="title">Titolo</label>
                    <input class=" form-control input-todolist" type="text" name="title" id="title" placeholder="Titolo" value="{{ old('title')}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="subtitle">Sottotitolo</label>
                    <input class=" form-control input-todolist" type="text" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ old('subtitle')}}">
                    @error('subtitle')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                {{-- TABELLA TASKS --}}
                <div id="tasks-container">
                    <div class="task">
                        <div class="form-group mb-3">
                            <label for="tasks[0][description]" class="label-todolist color-purple font-archivo shadow-purple mb-1">Attività</label>
                            <textarea class="textarea-todolist form-control" wrap="soft" name="tasks[0][description]" id="tasks[0][description]" placeholder="Attività">{{ old('tasks[0][description]')}}</textarea>
                            @error('tasks.0.description')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-5 ">
                    <button type="button" id="add-task-button" class="btn-aggiungi font-archivo shadow-purple">Aggiungi attività <i class="fa-solid fa-plus fa-plus-2"></i></button>
                </div>

                {{-- TABELLA LABELS --}}
                <div class="form-group  d-flex justify-content-between">
                    <label for="" class="label-todolist color-purple font-archivo shadow-purple ">Seleziona le etichette</label>   
                    <a href="{{route('admin.labels.create')}}">
                        <button type="button" class="btn-etichetta font-archivo shadow-purple me-3" >Crea un'etichetta <i class="fa-solid fa-plus fa-plus-3"></i></button>  
                    </a>
                    
                </div>

                <br>
                <div class=" mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <div class="row ">
                        @foreach ($labels as $label)
                            <div class="col-2 text-center mb-2">
                                <input name="labels[]" type="checkbox" class="btn-check btn-check-label" id="label-{{$label->id}}" value="{{$label->id}}" autocomplete="off" @checked(is_array(old('labels')) && in_array($labels->id, old('labels')))>
                                <label class="btn btn-label btn-outline " for="label-{{$label->id}}">
                                    <span class="badge badge-create text-bg-secondary"  style="background-color: {{$label->label_color}} !important; text-shadow: 2px 2px #00000020;">
                                        {{$label->label_name}}
                                        @if ($label->user_id != null)
                                            
                                        <button type="button" class="ms-3 btn-xmark" data-bs-toggle="modal" data-bs-target="#modalDeleteLabel{{ $label->id }}"><i class="fa-solid fa-xmark" style="color: #6f42c1; text-shadow: 2px 2px #00000020"></i></button>
                                            
                                        @endif
                                    </span>
                                </label>
                                
                            </div>
                        @endforeach  
                        @error('priority')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                

                {{-- TABELLA TODOLISTS --}}
                <div class="row mb-3">
                    <div class="col">
                        <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="priority">Livello di priorità</label>
                        <select name="priority" class="form-control select-todolist">
                            <option value="">Seleziona la priorità</option>
                            <option value="Urgente" {{old('priority') == 'Urgente' ? 'selected' : ''}}>Urgente</option>
                            <option value="Alta" {{old('priority') == 'Alta' ? 'selected' : ''}}>Alta</option>
                            <option value="Media" {{old('priority') == 'Media' ? 'selected' : ''}}>Media</option>
                            <option value="Bassa" {{old('priority') == 'Bassa' ? 'selected' : ''}}>Bassa</option>
                        </select>
                        @error('priority')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="expiration_date">Data di termine</label>
                        <input class=" form-control input-todolist" type="date" name="expiration_date" id="expiration_date"  value="{{ old('expiration_date')}}">
                        @error('expiration_date')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                
                

                <div class="form-group mb-5 text-end">
                    <button type="submit" class="btn-salva font-archivo shadow-purple">Salva</button>
                </div>

            </form>
        </div>
    </div>
</div>
@foreach ($todolists as $todolist)
    @include('admin.todolists.partials.modal_delete', ['todolist_id' => $todolist->id])
@endforeach
@foreach ($labels as $label)
    @include('admin.labels.partials.modal_delete_label', ['label_id' => $label->id])
@endforeach


<script>
    document.addEventListener('DOMContentLoaded', function () {
        let taskIndex = 1;
    
        document.getElementById('add-task-button').addEventListener('click', function () {
            let tasksContainer = document.getElementById('tasks-container');
    
            let newTask = document.createElement('div');
            newTask.classList.add('task');
            newTask.innerHTML = `
            
            <div class="form-group mb-3">
                    <label for="tasks[${taskIndex}][description]" class="label-todolist color-purple font-archivo shadow-purple mb-1">Attività</label>
                    <textarea class="textarea-todolist form-control" wrap="soft" name="tasks[${taskIndex}][description]" id="tasks[${taskIndex}][description]" placeholder="Attività">{{ old('tasks[${taskIndex}][description]')}}</textarea>
                    @error('tasks.${taskIndex}.description]')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            `;
    
            tasksContainer.appendChild(newTask);
            taskIndex++;
        });
    });
    </script>
@endsection