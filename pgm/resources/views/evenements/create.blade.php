@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' =>['EventsController@store'], 'method' => 'POST']) !!}
            @method('POST')
            @csrf
            <div class="col-sm-6 form-group">
                <h3>Évenements</h3>
            </div>
            <div class="col-sm-6 form-group">
                <h3>Cotisation</h3>
            </div>
            <div class="col-xs-12 form-group">

            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('eve_nom', 'Nom de l\'évenements :')}}
                {{Form::text('eve_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
            </div>
            <div class="col-sm-6 form-group">
                {{Form::label('cot_somme', 'Somme :')}}
                {{Form::text('cot_somme', '', ['class' => 'form-control', 'placeholder' => 'Somme'])}}
            </div>
            <div class="col-xs-12 form-group">

            </div>
            <div class="col-xs-3 form-group">
                {{Form::label('eve_datedebut', 'Date de début :')}}
                {!! Form::date('eve_datedebut', '',  ['class' => 'form-control']) !!}

            </div>
            <div class="col-xs-3 form-group">
                {{Form::label('eve_datefin', 'Date de fin :')}}
                {!! Form::date('eve_datefin', '',  ['class' => 'form-control']) !!}

            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cot_nbPaiement', 'Paiement en :')}}
                {{Form::number('cot_nbPaiement', '', ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
            </div>
            <div class="col-xs-3 form-group">
                {{Form::label('eve_horairedebut', 'Horaires début :')}}
                {!! Form::time('eve_horairedebut', '',  ['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-3 form-group">
                {{Form::label('eve_horairefin', 'Horaires fin :')}}
                {!! Form::time('eve_horairefin', '',  ['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cot_echeance', 'Echéance de paiement :')}}
                {!! Form::date('cot_echeance', '',  ['class' => 'form-control'])!!}
            </div>
            <div class="col-xs-12 form-group">

            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('eve_lieu', 'Lieu :')}}
                {{Form::text('eve_lieu', '',  ['class' => 'form-control', 'placeholder' => 'Lieu'])}}
            </div>
            <div class="col-xs-12 form-group">

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
