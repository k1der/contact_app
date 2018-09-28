<!doctype html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>

    {{ Form::open(array('url' => 'login')) }}
        <h1>Connexion</h1>

        <!-- Affiche les erreurs si il y en a -->
        <p>
            {{ $errors->first('email') }}
            {{ $errors->first('password') }}
        </p>

        <p>
            {{ Form::label('email', 'Addresse mail') }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
        </p>

        <p>
            {{ Form::label('password', 'Mot de passe') }}
            {{ Form::password('password') }}
        </p>

        <p>{{ Form::submit('Entrer') }}</p>
    {{ Form::close() }}

</body>
