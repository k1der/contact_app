<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use Validator;
use Input;
use Auth;

use App\Contact;

class ContactController extends Controller
{
    public function list() {
        $user = Auth::user();
        return View::make('contacts.list', compact('user'));
    }

    public function formCreate() {
        return View::make('contacts.form.create');
    }

    public function formUpdate( Contact $contact ) {
        return View::make('contacts.form.update', compact('contact'));
    }

    public function create() {
        // Définition des règles
        $rules = array(
            'email'    => 'required|email', // s'assuer que ce soit un email
            'first_name' => 'required|min:2', // requis, alphanumerique et d'une taille de 2 minimum
            'last_name' => 'required|min:2', // requis, alphanumerique et d'une taille de 2 minimum
        );

        // Verification de l'input
        $validator = Validator::make(Input::all(), $rules);

        // si la validation echoue, revenir sur la page de login et renvoi des erreurs
        if ($validator->fails()) {
            return redirect()->route('contacts.form.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $contact = new Contact();
            $contact->email = Input::get('email');
            $contact->first_name = Input::get('first_name');
            $contact->last_name = Input::get('last_name');
            $contact->user_id = Auth::id();

            $contact->user()->associate(Auth::id());

            $contact->save();

            return redirect()->route('contacts.list');
        }
    }

    public function update( Contact $contact ) {
        $rules = array(
            'email'    => 'required|email', // s'assuer que ce soit un email
            'first_name' => 'required|min:2', // requis, alphanumerique et d'une taille de 2 minimum
            'last_name' => 'required|min:2', // requis, alphanumerique et d'une taille de 2 minimum
        );

        $validator = Validator::make(Input::all(), $rules);

        // si la validation echoue, revenir sur la page de login et renvoi des erreurs
        if ($validator->fails()) {
            return redirect()->route('contacts.form.update')
                ->withErrors($validator)
                ->withInput();
        } else {
            $contact->email = Input::get('email');
            $contact->first_name = Input::get('first_name');
            $contact->last_name = Input::get('last_name');
            $contact->save();

            return redirect()->route('contacts.list');
        }
    }
}
