<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use Validator;
use Input;
use Auth;

class HomeController extends Controller
{
    public function showLogin()
    {
        // Afficher la page de login
        return View::make('login');
    }

    public function doLogin()
    {
        // Définition des règles
        $rules = array(
            'email'    => 'required|email', // s'assuer que ce soit un email
            'password' => 'required|alphaNum|min:3' // requis, alphanumerique et d'une taille de 3 minimum
        );

        // Verification de l'input
        $validator = Validator::make(Input::all(), $rules);

        // si la validation echoue, revenir sur la page de login et renvoi des erreurs
        if ($validator->fails()) {
            return redirect()->route('login.show')
                ->withErrors($validator)
                ->withInput(Input::except('password')); // renvoie les inputs sauf password
        } else {

            // creation des donnees utilisateurs pour l'authentification
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // tentative de connexion
            if (Auth::attempt($userdata)) {
                return redirect()->route('contacts.list');
            } else {
                return redirect()->route('login.show');
            }

        }
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
