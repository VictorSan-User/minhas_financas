<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View {
        return view('verified.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buscar = User::find($id);
        if($buscar){
            return view('users.show', compact('buscar'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Usuario no encontrado');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
