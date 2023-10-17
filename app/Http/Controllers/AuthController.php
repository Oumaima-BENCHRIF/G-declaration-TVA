<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    //

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:auths'],
            'password' => ['required'],
        ]);

        $user = Auth::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));


        return response()->json([
            'status' => 200,
            'message' => 'Ajouter avec succès',
        ]);
    }
}
