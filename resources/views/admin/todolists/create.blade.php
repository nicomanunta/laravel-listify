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
                            <textarea class="textarea-todolist form-control" wrap="soft" name="tasks[0][description]" id="tasks[0][description]" placeholder="Attività">{{ old('description')}}</textarea>
                            @error('description')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-5 ">
                    <button type="button" id="add-task-button" class="btn-aggiungi font-archivo shadow-purple">Aggiungi attività <i class="fa-solid fa-plus fa-plus-2"></i></button>
                </div>

                {{-- TABELLA TODOLISTS --}}
                <div class="row mb-3">
                    <div class="col">
                        <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="priority">Livello di priorità</label>
                        <select name="priority" class="form-control select-todolist">
                            <option value="">Seleziona la priorità</option>
                            <option value="Urgente">Urgente</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Bassa">Bassa</option>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let taskIndex = 1;
    
        document.getElementById('add-task-button').addEventListener('click', function () {
            let tasksContainer = document.getElementById('tasks-container');
    
            let newTask = document.createElement('div');
            newTask.classList.add('task');
            newTask.innerHTML = `
            
            <div class="form-group mb-3">
                    <label for="tasks[0][description]" class="label-todolist color-purple font-archivo shadow-purple mb-1">Attività</label>
                    <textarea class="textarea-todolist form-control" wrap="soft" name="tasks[0][description]" id="tasks[0][description]" placeholder="Compito">{{ old('description')}}</textarea>
                    @error('description')
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