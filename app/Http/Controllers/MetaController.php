<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Meta;

class MetaController extends Controller
{
    public function create() :View {
        return view('verified.create_meta');
    }

    public function store(Request $request) {
        $user_id = session('user_id');
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:4',
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'value' => 'required'
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'Mínimo de :min caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.min' => 'Mínimo de :min caracteres',
            'data_inicio.required' => 'A data de início é obrigatória',
            'data_fim.required' => 'A data final é obrigatória',
            'value.required' => 'O valor da meta  é obrigatório'
        ]);
        $validatedData['user_id'] = $user_id;
        $new_meta = Meta::create($validatedData);

        if($new_meta){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->with('error', 'Erro ao salvar novo registro financeiro');
        }
    }
}
