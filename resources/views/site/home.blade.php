@extends('layout.layout')
@section('title','Página Inicial')
@section('conteudo')


<div id="search-container" class="col-md-12">
    <div class="container">
        <h1>Busque um evento</h1>
        <form action="{{ route('home')}}" method="GET">
            <input style="display: inline-block;" type="text" name="search" class="search form-control" placeholder="Procurar...">
            <button type="submit" class="search"><ion-icon name="search-outline"></ion-icon></button>
        </form>
    </div>
</div>
<div class="container">
    <div id="events" class="events-container col-md-12">
        @if ($search)
        <h2>Busando por: {{$search}}</h2>

        @else
        <h2>Próximos eventos:</h2>
        <p>Veja os eventos dos proximos dias</p>
        @endif

    </div>
    <div id="cards" class="cards-container row">
        @foreach ($events as $event)
            <div id="card" class="card-single card col-md-3">
                <img src="{{ asset('img/events/'.$event->image)}}" alt="{{$event->titulo}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date))}}</p>
                    <h5 class="card-title">{{$event->titulo}}</h5>
                    <p class="card-participantes">{{count($event->users)}} Participantes</p>
                    <p class="event-descricao">{{ $event->descricao}}</p>
                    <a href="{{ route('mostrar_evento',['id'=>$event->id])}}" class="btns" id="event-submit">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($events) == 0 && $search)
            <h3 class="sem-evento">Não há nenhum evento com {{$search}}!!
            <ion-icon name="sad-outline"></ion-icon></h3>
            <a style="text-align: center" href="{{ route('home')}}">Ver todos</a>
        @endif
    </div>
</div>

@endsection
