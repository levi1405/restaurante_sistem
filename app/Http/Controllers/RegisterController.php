<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    // function to register whith request
    public function register(RegisterRequest $request){
/* 
    // Asegúrate de que id_rol esté configurado en el formulario como 'custom_id_rol'
    $idRol = $data['custom_id_rol'] ?? 2; */
        $user= User::create($request->all());
        return redirect('/login')->with('success', "Account successfully registered.");
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
