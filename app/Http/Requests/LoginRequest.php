<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// rename Factory as ValidationFactory
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'username' =>'required',
        'password' =>'required'
        ];
    }

    // define cómo se obtienen las credenciales del usuario para el inicio de sesión
    public function getCredentials(){
        // recupera el valor de --username--, 
        // verifica si el valor de username es un correo llamando al método isEmail()
        $username=$this->get('username');

        if ($this->isEmail($username)) {
            return [
                'email' => $username,
                'password' => $this->get('password')
            ];
        }
        return $this->only('username', 'password');
    }

    // retorna un valor booleano para saber si $param es un email o no
    private function isEmail($param)
    {
        // comprueba si un valor dado es una dirección de correo electrónico.
        //  Para hacerlo, utiliza la clase ValidationFactory para realizar una 
        //  validación rápida. Crea una instancia de ValidationFactory y utiliza
        //   el método make() para validar el valor proporcionado como una dirección
        //    de correo electrónico. Si la validación tiene éxito, significa que el valor 
        //    es una dirección de correo electrónico y se devuelve true, de lo contrario, 
        //    se devuelve false.
        $factory = $this->container->make(ValidationFactory::class);

        // pasamos a username el valor de param y verificamos que NO sea un email
        //  y si falla se regresa se devuelve un false
        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email']
        )->fails();
    }
}
