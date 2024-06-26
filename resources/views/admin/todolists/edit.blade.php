@extends('layouts.style')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-uppercase font-archivo h1-title color-purple text-center mt-3 ">Modifica la to-do list <br><span class="color-yellow font-archivo">"{{$todolist->title}}"</span></h1>
        </div>
        <div class="col-12">
            <form action="{{route('admin.todolists.update', ['todolist' => $todolist->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- TABELLA TODOLISTS --}}
                <div class="form-group my-3">
                    <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="title">Titolo</label>
                    <input class=" form-control input-todolist" type="text" name="title" id="title" placeholder="Titolo" value="{{ old('title', $todolist->title)}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="subtitle">Sottotitolo</label>
                    <input class=" form-control input-todolist" type="text" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ old('subtitle', $todolist->subtitle)}}">
                    @error('subtitle')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                {{-- TABELLA TASKS --}}
                @foreach ($todolist->tasks as $index => $task)
                    <div id="tasks-container">
                        <div class="task">
                            <div class="form-group mb-3">
                                <label for="tasks[{{$index}}][description]" class="label-todolist color-purple font-archivo shadow-purple mb-1">Attività</label>
                                <textarea class="textarea-todolist form-control" wrap="soft" name="tasks[{{$index}}][description]" id="tasks[{{$index}}][description]" placeholder="Attività">{{ old('tasks.'.$index.'.description', $task->description )}}</textarea>
                                @error('tasks.'.$index.'.description')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="form-group mb-5 ">
                    <button type="button" id="add-task-button" class="btn-aggiungi font-archivo shadow-purple">Aggiungi attività <i class="fa-solid fa-plus fa-plus-2"></i></button>
                </div>

                {{-- TABELLA LABELS --}}
                <div class="form-group  d-flex justify-content-between">
                    <label for="" class="label-todolist color-purple font-archivo shadow-purple ">Seleziona le etichette</label>
                    <button type="button" id="" class="btn-etichetta font-archivo shadow-purple me-5">Crea un'etichetta <i class="fa-solid fa-plus fa-plus-3"></i></button>
                </div>
                <br>
                <div class=" mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <div class="row ">
                        @foreach ($labels as $label)
                            <div class="col-2 text-center mb-2">
                                <input name="labels[]" type="checkbox" class="btn-check" id="label-{{$label->id}}" value="{{$label->id}}" autocomplete="off" @checked((is_array(old('labels')) && in_array($label->id, old('labels'))) || ( !is_array(old('labels')) && $todolist->labels->contains($label->id) ))>
                                <label class="btn btn-label btn-outline " for="label-{{$label->id}}"><span class="badge text-bg-secondary"  style="background-color: {{$label->label_color}} !important; text-shadow: 2px 2px #00000020;">{{$label->label_name}}</span></label>
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
                            <option value="Urgente" {{old('priority', $todolist->priority) == 'Urgente' ? 'selected' : ''}}>Urgente</option>
                            <option value="Alta" {{old('priority', $todolist->priority) == 'Alta' ? 'selected' : ''}}>Alta</option>
                            <option value="Media" {{old('priority', $todolist->priority) == 'Media' ? 'selected' : ''}}>Media</option>
                            <option value="Bassa" {{old('priority', $todolist->priority) == 'Bassa' ? 'selected' : ''}}>Bassa</option>
                        </select>
                        @error('priority')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="expiration_date">Data di termine</label>
                        <input class=" form-control input-todolist" type="date" name="expiration_date" id="expiration_date"  value="{{ old('expiration_date', $todolist->expiration_date)}}">
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