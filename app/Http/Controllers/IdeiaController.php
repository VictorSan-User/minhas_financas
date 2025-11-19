<?php

namespace App\Http\Controllers;

use App\Models\Ideia;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IdeiaController extends Controller
{
    public function create() :View {
        return view('verified.create_ideia');
    }

    public function store(Request $request) {
        $user_id = session('user_id');
        $dadosValidados = $request->validate([
            'titulo' => 'required|min:3',
            'description' => 'required',
        ], [
            'titulo.required' => 'O titulo é obrigatorio',
            'titulo.min' => 'Minimo de :min caracteres',
            'description.required' => 'A descrição é obrigatoria'
        ]);
        $dadosValidados['user_id'] = $user_id;

        $newIdeia = Ideia::create($dadosValidados);

        if($newIdeia) {
            return redirect()->route('user.dashboard')->with('success', 'Ideia adicionada com sucesso!');
        }else{
            return redirect()->route('user.dashboard')->with('error', 'Ideia não pode ser salva!');
        }
    }

    public function show(string $id){
        $ideia = Ideia::findOrFail($id);

        if($ideia) {
            return view('verified.exibe_ideia', ['ideia' => $ideia]);
        }
    }

    public function edit(string $id) {
        $ideia = Ideia::findOrFail($id);

        if($ideia) {
            return view('verified.edit_ideia', ['ideia' => $ideia]);
        }else{
            return back()->with('error', 'Erro ao localizar a ideia!');
        }
    }

    public function update(Request $request, string $id) {
        $user_id = session('user_id');
        $dadosValidados = $request->validate([
            'titulo' => 'required|min:3',
            'description' => 'required',
        ], [
            'titulo.required' => 'O titulo é obrigatorio',
            'titulo.min' => 'Minimo de :min caracteres',
            'description.required' => 'A descrição é obrigatoria'
        ]);
        $dadosValidados['user_id'] = $user_id;
        $edit = Ideia::findOrFail($id);

        $atualizar = $edit->update($dadosValidados);

        if($atualizar) {
            return redirect()->route('user.dashboard')->with('success', 'Ideia atuaizada com sucesso!');
        }else{
            return redirect()->route('user.dashboard')->with('error', 'Ideia não pode ser atualizada!');
        }
    }

    public function destroy_confirm(string $id) :View {
        $ideia = Ideia::findOrFail($id);
        return view('verified.confirm_deleteIdeia', ['ideia' => $ideia]);
    }

    public function destroy(string $id) {
        //delete
        $ideia = Ideia::findOrFail($id);

        $excluir = $ideia->delete();
        if($excluir){
            return redirect()->route('user.dashboard')
                             ->with('success', 'Ideia excluida com sucesso!');
        }else{
            return redirect()->route('user.dashboard')
                             ->with('error', 'Erro ao excluir ideia! Tente novamente mais tarde!');
        }
    }
}
