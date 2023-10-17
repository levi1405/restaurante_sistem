<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        // verifica si el usuario ya ha iniciado sesión utilizando Auth::check()
        if(Auth::check()){
            // si es asi lo redirige a home
            return redirect()->route('home');
        }
        // si no es asi redirige al login
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // getCredentials() en el objeto $request para obtener las credenciales
        //  de inicio de sesión, definido en LoginRequest
        $credentials = $request->getCredentials();
        // Auth::validate($credentials) para verificar si las credenciales
        //  proporcionadas NO son correctas, de ser asi redirige al login
        if(!Auth::validate($credentials)):
            // dd('error');
           return redirect()->to('/login')
                ->withErrors(trans('auth.failed'));
        endif;
        // Recuperar el usuario correspondiente a las credenciales proporcionadas
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Auth::login($user) para autenticar al usuario en el sistema.
        Auth::login($user);
        //manda un objeto de que esta autenticado
        return $this->authenticated($request, $user);
    }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }
}
