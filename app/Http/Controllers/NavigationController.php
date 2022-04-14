<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function home()
    {
        $search = request('search');

        if($search) {

            $events = Events::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Events::all();
        }

        return view('site.home',['events' => $events, 'search' => $search]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard',['events' => $events,
            'eventsAsParticipant' => $eventsAsParticipant
        ]);
    }


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $events = new Events();

        $events -> titulo = $request -> titulo;
        $events -> date = $request -> date;
        $events -> descricao = $request -> descricao;
        $events -> cidade = $request -> cidade;
        $events -> privado = $request -> privado;
        $events -> items = $request -> items;

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $events->image = $imageName;

        }

        $user = auth()->user();
        $events->user_id = $user->id;

        $events->save();

        return redirect('/eventos/criar')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Events::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if ($user) {

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event], ['eventOwner' => $eventOwner,'hasUserJoined' => $hasUserJoined]);
    }

    public function destroy($id) {

        Events::findOrFail($id)->delete();

        return redirect('dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {
        $user = auth()->user();

        $event = Events::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('dashboard')->with('negado', 'Você não tem permissão para editar este evento!');
        }

        return view('events.edit',['event' => $event]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;

        }

        Events::findOrFail($request->id)->update($data);

        return redirect('dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Events::findOrFail($id);

        return redirect('dashboard')->with('msg','Sua presença está confirmada no '. $event->titulo);
    }

    public function leaveEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Events::findOrFail($id);

        return redirect('dashboard')->with('msg','Você saiu do '. $event->titulo);
    }

}
