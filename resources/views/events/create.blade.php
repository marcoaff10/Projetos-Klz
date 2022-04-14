@extends('layout.layout')
@section('title','Criar Evento')
@section('conteudo')

<div id="events-create" class="col-md-6 offset-md-3">
    @if(session('msg'))
        <p class="msg">{{ session('msg')}}</p>
    @endif
<h2>Crie o seu evento</h2>
<form action="{{ route('criar')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label style="display: block;" for="image">Imagem:</label>
        <input style="display: block;" type="file" name="image" id="image" class="from-control-file">
    </div>
    <div class="form-group">
        <label for="titulo">Evento:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do Evento...">
    </div>
    <div class="form-group">
        <label for="date">Evento:</label>
        <input type="date" name="date" id="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Local do Evento...">
    </div>
    <div class="form-group">
        <label for="privado">O evento é privado?</label>
        <select name="privado" id="privado" class="form-control">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea style="height: 120px;" name="descricao" id="descricao" class="form-control" placeholder="Descrição do Evento..."></textarea>
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
    <input type="submit" value="Criar" class="btns" style="width: 20%;">
</form>
</div>

@endsection
