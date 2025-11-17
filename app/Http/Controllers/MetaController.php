<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Meta;
use Exception;

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
            'valor' => 'required'
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'Mínimo de :min caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.min' => 'Mínimo de :min caracteres',
            'data_inicio.required' => 'A data de início é obrigatória',
            'data_fim.required' => 'A data final é obrigatória',
            'valor.required' => 'O valor da meta  é obrigatório'
        ]);
        $validatedData['user_id'] = $user_id;
        $new_meta = Meta::create($validatedData);

        if($new_meta){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->with('error', 'Erro ao salvar novo registro financeiro');
        }
    }

    public function show(string $id){
        //get
        try{
            $meta = Meta::findOrFail($id);
            return view('meta_completa', ['meta' => $meta]);
        }catch(Exception $e){
            return redirect()->back('error', 'Erro ao atualizar meta: '. $e->getMessage());
        }
    }

    public function edit(string $id) {
        //get
        $meta = Meta::findOrFail($id);
        return view('verified.editar_meta', ['meta' => $meta]);
    }

    public function update(Request $request, string $id) {
        //put
        $meta = Meta::findOrFail($id);

        $user_id = session('user_id');
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:4',
            'valor' => 'required',
            'data_inicio' => 'required',
            'data_fim' => 'required'
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'Mínimo de :min caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.min' => 'Mínimo de :min caracteres',
            'valor.required' => 'O valor da meta  é obrigatório',
            'data_inicio.required' => 'A data de início é obrigatória',
            'data_fim.required' => 'A data final é obrigatória'
        ]);
        $validatedData['user_id'] = $user_id;
        if($meta->update($validatedData)){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->with('error', 'Erro ao salvar novo registro financeiro');
        }
    }

    public function destroy_confirm(string $id):View {
        $meta = Meta::findOrFail($id);
        return view('verified.destroyMeta_confirm', ['meta'=> $meta]);
    }

    public function destroy(string $id) {
        //delete
        $meta_deleted = Meta::findOrFail($id);
        if($meta_deleted->delete()){
            return redirect()
                   ->route('user.dashboard')
                   ->with('success', 'Meta excluida com sucesso!');
        }else{
            return redirect()
                   ->route('user.dashboard')
                   ->with('error', 'Erro ao excluir, tente novamente mais tarde!');
        }
    }
}
