<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inscription</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Inscription
        </div>

        <div>
            {!! Form::open(['url' => 'register', 'method' => 'post']) !!}
            {{ Form::label('email', 'E-mail' )}}<br>
            {{ Form::text('email','',array('required' => 'required')) }}
            <br>
            {{Form::label('email_confirmation', 'Confirmation de l\'e-mail')}}<br>
            {{ Form::text('email_confirmation','',array('required' => 'required')) }}
            <br><br>

            {{Form::label('password', 'Mot de passe')}}<br>
            {{ Form::password('password',array('required' => 'required')) }}
            <br>
            {{Form::label('password_confirmation', 'Confirmation du mot de passe')}}<br>
            {{ Form::password('password_confirmation',array('required' => 'required')) }}
            <br><br>

            {{Form::label('last_name', 'Nom')}}<br>
            {{ Form::text('last_name','') }}
            <br>
            {{Form::label('first_name', 'Prénom')}}<br>
            {{ Form::text('first_name','') }}
            <br>
            {{Form::label('phone', 'Téléphone')}}<br>
            {{ Form::text('phone','') }}
            <br>
            {{Form::label('country', 'Pays')}}<br>
            {{ Form::text('country','') }}
            <br>
            {{Form::label('city', 'Ville')}}<br>
            {{ Form::text('city','') }}
            <br>
            {{Form::label('need', 'Besoin')}}<br>
            {{Form::select('need', ['dress' => 'M’habiller', 'idees' => 'Me donner des idées'], null, ['placeholder' => 'Sélectionnez votre besoin'])}}
            <br>
            {{ csrf_field() }}
            <input type="submit" value="Envoyer">
            {!! Form::close() !!}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
