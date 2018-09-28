<!doctype html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h1>Vos contacts (<a href={!! route('contacts.form.create') !!}>ajouter contact</a>)</h1>
    @foreach($user->contacts as $contact)
        <p class="{!! $contact->id !!}">
            {{ $contact->last_name }} {{ $contact->first_name }} : <a>{{ $contact->email }}</a> <a href="{!! route('contacts.form.update', ['contact'=>$contact->id]) !!}">modifier</a>
        </p>
    @endforeach
    <a href={!! route('logout.do') !!}>Se déconnecter</a>
</body>
