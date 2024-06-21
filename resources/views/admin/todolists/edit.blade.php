

@extends('layouts.style')
@section('content')
<div class="container">
    edit.blade
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-uppercase font-archivo h1-title color-purple text-center mt-3 ">Crea una nuova To-do List</h1>
        </div>
        <div class="col-12">
            <form action="{{route('admin.todolists.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TABELLA TODOLISTS --}}
                <div class="form-group my-3">
                    <label class="color-purple font-archivo shadow-purple mb-1" for="title">Titolo</label>
                    <input class=" form-control" type="text" name="title" id="title" placeholder="Titolo" value="{{ old('title')}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="color-purple font-archivo shadow-purple mb-1" for="subtitle">Sottotitolo</label>
                    <input class=" form-control" type="text" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ old('subtitle')}}">
                    @error('subtitle')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="color-purple font-archivo shadow-purple mb-1" for="priority">Livello di priorità</label>
                        <select name="priority" class="form-control ">
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
                        <label class="color-purple font-archivo shadow-purple mb-1" for="expiration_date">Data di termine</label>
                        <input class=" form-control" type="date" name="expiration_date" id="expiration_date"  value="{{ old('expiration_date')}}">
                        @error('expiration_date')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                {{-- TABELLA TASKS --}}
                <div class="form-group mb-3">
                    <label for="tasks[0][description]" class="color-purple font-archivo shadow-purple mb-1">Compito</label>
                    <textarea class="form-control" wrap="soft" name="tasks[0][description]" id="tasks[0][description]" placeholder="Compito">{{ old('description')}}</textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                

                <div class="form-group mb-5 text-end">
                    <button class="btn-salva font-archivo shadow-purple">Salva</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
