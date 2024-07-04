
@extends('layouts.style')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 ">
          <h2 class="modal-title text-uppercase font-archivo shadow-purple color-yellow ">Crea un'etichetta</h2>
        </div>
        <div class="col-12">
          <form action="{{route('admin.labels.store')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group mb-2">
                <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="label_name">Nome dell'etichetta</label>
                <input class=" form-control input-todolist" type="text" name="label_name" id="label_name" placeholder="Nome " value="{{ old('label_name')}}">
                @error('label_name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group my-4">
                <label class="label-todolist color-purple font-archivo shadow-purple mb-1" for="label_color">Scegli un colore per l'etichetta</label>
                <div class="row justify-content-center ">
                  <div class="form-check form-check-inline col-5 my-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_rosso" value="#FF0000" {{ old('label_color') == '#FF0000' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_rosso">Rosso <i class="fa-solid fa-square" style="color: #FF0000;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 my-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_rosso_arancione" value="#FF4500" {{ old('label_color') == '#FF4500' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_rosso_arancione">Rosso-Arancione <i class="fa-solid fa-square" style="color: #FF4500;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_arancione" value="#FFA500" {{ old('label_color') == '#FFA500' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_arancione">Arancione <i class="fa-solid fa-square" style="color: #FFA500;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_oro" value="#FFD700" {{ old('label_color') == '#FFD700' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_oro">Giallo-Oro <i class="fa-solid fa-square" style="color: #FFD700;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_giallo" value="#FFFF00" {{ old('label_color') == '#FFFF00' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_giallo">Giallo <i class="fa-solid fa-square" style="color: #FFFF00;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_giallo_verdastro" value="#ADFF2F" {{ old('label_color') == '#ADFF2F' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_giallo_verdastro">Giallo-Verdastro <i class="fa-solid fa-square" style="color: #ADFF2F;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_verde" value="#008000" {{ old('label_color') == '#008000' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_verde">Verde <i class="fa-solid fa-square" style="color: #008000;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_verde_acqua" value="#7FFFD4" {{ old('label_color') == '#7FFFD4' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_verde_acqua">Verde-Acqua <i class="fa-solid fa-square" style="color: #7FFFD4;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_azzurro" value="#00FFFF" {{ old('label_color') == '#00FFFF' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_azzurro">Azzurro <i class="fa-solid fa-square" style="color: #00FFFF;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_blu" value="#0000FF" {{ old('label_color') == '#0000FF' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_blu">Blu <i class="fa-solid fa-square" style="color: #0000FF;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_indaco" value="#4B0082" {{ old('label_color') == '#4B0082' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_indaco">Indaco <i class="fa-solid fa-square" style="color: #4B0082;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_blu_reale" value="#8A2BE2" {{ old('label_color') == '#8A2BE2' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_blu_reale">Blu-Reale <i class="fa-solid fa-square" style="color: #8A2BE2;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_viola" value="#800080" {{ old('label_color') == '#800080' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_viola">Viola <i class="fa-solid fa-square" style="color: #800080;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_marrone" value="#A52A2A" {{ old('label_color') == '#A52A2A' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_marrone">Marrone <i class="fa-solid fa-square" style="color: #A52A2A;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 mb-2">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_grigio" value="#808080" {{ old('label_color') == '#808080' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_grigio">Grigio <i class="fa-solid fa-square" style="color: #808080;"></i></label>
                  </div>
                  <div class="form-check form-check-inline col-5 ">
                    <input class="form-check-input" type="radio" name="label_color" id="label_color_rosa" value="#FFC0CB" {{ old('label_color') == '#FFC0CB' ? 'checked' : '' }}>
                    <label class="form-check-label" for="label_color_rosa">Rosa <i class="fa-solid fa-square" style="color: #FFC0CB;"></i></label>
                  </div>
                </div>
                
                @error('label_color')
                    <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="modal-footer bg-color-grey border-0">
                <button type="submit" class="btn btn-salva font-archivo">Salva etichetta</button>
              </div>
            </form>
        </div>
    </div>
</div>
@foreach ($todolists as $todolist)
    @include('admin.todolists.partials.modal_delete', ['todolist_id' => $todolist->id])
@endforeach

@endsection