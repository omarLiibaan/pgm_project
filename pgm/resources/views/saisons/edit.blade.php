@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' =>['SaisonsController@update', $saison->id], 'method' => 'POST']) !!}
            @method('PUT')
            @csrf
            <div class="col-xs-12 form-group"></div>
            <div class="col-xs-12 form-group"></div>
            <div class="col-xs-6 form-group">
                {{Form::label('sai_nomCategorie', 'Nom de la saison:')}}
                {{Form::text('sai_nomCategorie', $saison->sai_nomCategorie, ['class' => 'form-control', 'placeholder' => 'Nom de la saison'])}}
            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('sai_dateDebut', 'Date de début :')}}
                {!! Form::date('sai_dateDebut',Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateDebut))->format('Y-m-d'),  ['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('sai_dateFin', 'Date de fin :')}}
                {!! Form::date('sai_dateFin', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateFin))->format('Y-m-d'),  ['class' => 'form-control']) !!}
            </div>

            <div class="col-xs-6 form-group">
                <p></p>
            </div>
            <div class="col-xs-6 form-group">
                {{Form::submit('Modifier', ['class' => 'btn btn-primary btn-block'])}}
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
