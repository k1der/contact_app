<!doctype html>
<html>
<head>
    <title>Modifier contact</title>
</head>
<body>

    {{ Form::open(array('url' => 'contacts/'.$contact->id.'/update')) }}
        <h1>Modifier contact</h1>

        <!-- Affiche les erreurs si il y en a -->
        <p>
            {{ $errors->first('last_name') }}
            {{ $errors->first('first_name') }}
            {{ $errors->first('email') }}
        </p>

        <p>
            {{ Form::label('last_name', 'Nom de famille') }}
            {{ Form::text('last_name', $contact->last_name, array('placeholder' => 'Dupont')) }}
        </p>

        <p>
            {{ Form::label('first_name', 'Prénom') }}
            {{ Form::text('first_name', $contact->first_name, array('placeholder' => 'Jacques')) }}
        </p>

        <p>
            {{ Form::label('email', 'Addresse mail') }}
            {{ Form::text('email', $contact->email, array('placeholder' => 'awesome@awesome.com')) }}
        </p>

        <p>{{ Form::submit('Sauver') }}</p>
    {{ Form::close() }}

</body>
