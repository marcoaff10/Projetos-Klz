@extends('layout.layout')
@section('title','Editar Evento')
@section('conteudo')

<div id="events-create" class="col-md-6 offset-md-3">
    @if(session('msg'))
        <p class="msg">{{ session('msg')}}</p>
    @endif
<h2>Editando: {{ $event->titulo}}</h2>
<form action="{{ route('update',['id' => $event->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="image">Imagem:</label>
        <input type="file" name="image" id="image" class="from-control-file">
        <img src="{{ asset('img/events/'.$event->image)}}" alt="{{$event->titulo}}" class="img-preview">
    </div>
    <div class="form-group">
        <label for="titulo">Evento:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{$event->titulo}}">
    </div>
    <div class="form-group">
        <label for="date">Evento:</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ $event->date->format('Y-m-d')}}">
    </div>
    <div class="form-group">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" class="form-control" value="{{$event->cidade}}">
    </div>
    <div class="form-group">
        <label for="privado">O evento é privado?</label>
        <select name="privado" id="privado" class="form-control">
            <option value="0">Não</option>
            <option value="1" {{$event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea style="min-height: 120px;" name="descricao" id="descricao" class="form-control">{{$event->descricao}}</textarea>
    </div>
    <div class="checkbox form-group">
        <label for="items">Adicione itens de infraestrutura:</label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Palco"> Palco
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Open food"> Open food
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>
    </div>
    <input type="submit" value="Editar" class="btns" style="width: 20%;">
</form>
</div>

@endsection
