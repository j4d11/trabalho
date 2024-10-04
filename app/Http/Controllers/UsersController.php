<?php

namespace App\Http\Controllers;

use App\Models\Perfils;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('ola');
        $users = Users::all();
        $perfils = Perfils::all();
        return view('users.index', compact('perfils', 'users'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email',
        ]);

        Users::create($validated);
        return redirect('/users');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

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
