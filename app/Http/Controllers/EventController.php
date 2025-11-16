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
}
