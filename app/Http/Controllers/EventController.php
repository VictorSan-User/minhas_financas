<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class EventController extends Controller
{
    public function create() :View {
        return view('verified.create_event');
    }

    public function store(Request $request) {
        $user_id = session('user_id');
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'event_date' => 'required',
            'value' => 'required'
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'Mínimo de :min caracteres',
            'description.required' => 'A descrição é obrigatória',
            'event_date.required' => 'A data é obrigatória',
            'value.required' => 'O valor do evento é obrigatório'
        ]);
        $validatedData['user_id'] = $user_id;
        $new_event = Event::create($validatedData);

        if($new_event){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->with('error', 'Erro ao salvar novo registro financeiro');
        }
    }

    public function show(string $id) {
        //get
        $evento = Event::findOrFail($id);
        return view ('verified.exibe_evento', ['evento' => $evento]);

    }

    public function edit(string $id):View {
        //get
        $evento = Event::findOrFail($id);
        // retorna a view pra editar
        return view ('verified.exibe_evento', ['evento' => $evento]);
    }

    public function update(Request $request, string $id) {
        //put
        $event = Event::findOrFail($id);

        $user_id = session('user_id');
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'event_date' => 'required',
            'value' => 'required'
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'Mínimo de :min caracteres',
            'description.required' => 'A descrição é obrigatória',
            'event_date.required' => 'A data é obrigatória',
            'value.required' => 'O valor do evento é obrigatório'
        ]);
        $validatedData['user_id'] = $user_id;

        $update = $event->update($validatedData);

        if($update){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->with('error', 'Erro ao salvar novo registro financeiro');
        }
    }

    public function destroy_confirm(string $id):View {
        return view('verified.destroy_confirm', ['id' => $id]);
    }

    public function destroy(string $id) {
        //delete
        $evento = Event::findOrFail($id);

        $destroy = $evento->delete();
        if($destroy){
            return redirect()->route('user.dashboard')
                             ->with('success', 'Registro excluido com sucesso!');
        }else{
            return redirect()->route('user.dashboard')
                             ->with('error', 'Erro ao excluir registro! Tente novamente mais tarde!');
        }
    }
}
