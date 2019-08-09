@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' =>['MembersController@store'], 'method' => 'POST']) !!}
            @method('POST')
            @csrf
            <div class="col-xs-6 form-group">
                {{Form::label('my_checkbox', 'Choisir :')}}
                <p></p>
                <input type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme"> Femme
                <input type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme"> Homme
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_nom', 'Nom :')}}
                {{Form::text('mem_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_prenom', 'Prénom :')}}
                {{Form::text('mem_prenom', '',  ['class' => 'form-control', 'placeholder' => 'Prénom'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_datenaissance', 'Date de naissance :')}}
                {!! Form::date('mem_datenaissance', '',  ['class' => 'form-control']) !!}

            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_numeroportable', 'Numéro de portable :')}}
                {{Form::text('mem_numeroportable', '',  ['class' => 'form-control', 'placeholder' => 'Numéro de portable'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_email', 'E-mail :')}}
                {{Form::text('mem_email', '',  ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_adresse', 'Adresse :')}}
                {{Form::text('mem_adresse', '',  ['class' => 'form-control', 'placeholder' => 'Adresse'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_npa', 'NPA :')}}
                {{Form::number('mem_npa', '',  ['class' => 'form-control', 'placeholder' => 'NPA'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_localite', 'Localité :')}}
                {{Form::text('mem_localite', '',  ['class' => 'form-control', 'placeholder' => 'Localité'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_pays', 'Pays :')}}
                <select class="form-control" name="mem_pays">
                    @foreach($pays as $paysNom)
                        <option value="{{ $paysNom }}">{{ $paysNom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_numlicense', 'N° de licence :')}}
                {{Form::text('mem_numlicense', '',  ['class' => 'form-control', 'placeholder' => 'N° de Licence'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('mem_entredate', 'Date d\'entrée :')}}
                {!! Form::date('mem_entredate', Carbon\Carbon::now()->format('d.m.Y'),  ['class' => 'form-control']) !!}

            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('statut', 'Statut du membre :')}}
                <select class="form-control" name="statut">
                    @foreach($statut as $stat)
                        <option value="{{ $stat }}" >{{ $stat}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-6 form-group">
                <p></p>
            </div>
            <div class="col-xs-6 form-group">
                {{Form::submit('Ajouter', ['class' => 'btn btn-primary btn-block'])}}
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::close() !!}
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
@endsection
