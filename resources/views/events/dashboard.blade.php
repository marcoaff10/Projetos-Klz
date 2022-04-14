@extends('layout.layout')
@section('title','Painel de Controle')
@section('conteudo')

@if(session('msg'))
    <p class="msg">{{ session('msg')}}</p>
@endif
@if(session('negado'))
    <p class="negado">{{ session('negado')}}</p>
@endif
<div style="padding: 10px 2%;" class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div style="padding: 30px 2%;" class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <td style="padding-top: 15px" scope="row">{{$loop->index + 1}}</td>
                <td style="padding-top: 15px"><a style="text-decoration: none;" href="{{ route('mostrar_evento',['id' => $event->id])}}">
                {{$event->titulo}}</a></td>
                <td style="padding-top: 15px">{{count($event->users)}}</td>
                <td>
                    <a href="{{ route('editar',['id' => $event->id])}}" title="Editar" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                        <form action="{{ route('deletar',['id' => $event->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button title="Deletar" type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <p>Você não tem eventos <a href="{{ route('criar_evento')}}">Criar evento</a></p>
    @endif
</div>
<div style="padding: 10px 2%;" class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>
<div style="padding: 30px 2%;" class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($eventsAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($eventsAsParticipant as $event)
                <tr>
                    <td style="padding-top: 15px" scope="row">{{$loop->index + 1}}</td>
                    <td style="padding-top: 15px"><a style="text-decoration: none;" href="{{ route('mostrar_evento',['id' => $event->id])}}">
                    {{$event->titulo}}</a></td>
                    <td style="padding-top: 15px">{{count($event->users)}}</td>
                    <td>
                        <form action="{{ route('sair_evento',['id' =>$event->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>

        @else
            <p>Você ainda nça está participando de nenhum evento, <a href="{{ route('home')}}">Vejá todos os eventos.</a></p>

    @endif
</div>
@endsection
