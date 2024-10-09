<?php

namespace App\Http\Controllers;

use App\Models\Perfils;
use App\Models\UserPerfil;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::with('listPerfil.perfil')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perfils = Perfils::all();
        return view('users.create', compact('perfils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email',
            // 'perfil_id'=> 'required',
            'perfils'=> 'required|array',
        ]);

        $user = Users::create($validated);

        //lista
        // $perfil = UserPerfil::create([
        //     'user_id' => $user->id,
        //     'perfil_id' => $request->perfils,
        // ]);
        foreach ($request->perfils as $perfilId) {
            UserPerfil::create([
                'user_id' => $user->id,
                'perfil_id' => $perfilId,
            ]);
        }
    
        // $perfil->save();

        return redirect('/users');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Users::find($id);
        $perfils = Perfils::all();
        return view('users.edit', compact('user', 'perfils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email',
        ]);

        Users::where('id', $id)->update($validated);

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = Users::findOrFail($id);
            $user->delete();
            return redirect('/users');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
