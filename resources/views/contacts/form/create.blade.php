<!doctype html>
<html>
<head>
    <title>Insérer un nouveau contact</title>
</head>
<body>

    {{ Form::open(array('url' => 'contacts/create')) }}
        <h1>Insérer un nouveau contact</h1>

        <!-- Affiche les erreurs si il y en a -->
        <p>
            {{ $errors->first('last_name') }}
            {{ $errors->first('first_name') }}
            {{ $errors->first('email') }}
        </p>

        <p>
            {{ Form::label('last_name', 'Nom de famille') }}
            {{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Dupont')) }}
        </p>

        <p>
            {{ Form::label('first_name', 'Prénom') }}
            {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'Jacques')) }}
        </p>

        <p>
            {{ Form::label('email', 'Addresse mail') }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
        </p>

        <p>{{ Form::submit('Sauver') }}</p>
    {{ Form::close() }}

</body>
