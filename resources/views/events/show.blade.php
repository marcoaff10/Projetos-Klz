@extends('layout.layout')
@section('title',$event->titulo)
@section('conteudo')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img class="img-fluid" src="{{ asset('img/events/'.$event->image)}}" alt="{{ $event->titulo}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $event->titulo}}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>
            {{$event->cidade}}</p>
            <p class="event-date"><ion-icon name="calendar-outline"></ion-icon>{{ date('d/m/Y', strtotime($event->date))}}</p>
            <p class="events-participantes"><ion-icon name="people-outline"></ion-icon>{{count($event->users)}} Participantes</p>
            <p class="events-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name']}}</p>
            <br>
            @if (!$hasUserJoined)
                <form action="/eventos/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/eventos/join/{{ $event->id }}"
                    class="btns"
                    id="event-submit"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Confirmar Presença
                    </a>
                </form>
            @else
                <p class="already-joined-msg">Você já está participando deste evento!</p>
            @endif
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach ($event->items as $item)
                <li><ion-icon name="play-outline"></ion-icon>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="event-descricao">
            <h3>Sobre o Evento:</h3>
            <p class="event-descricao">{{ $event->descricao}}</p>
        </div>
    </div>
</div>


@endsection
