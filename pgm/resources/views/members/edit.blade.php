@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {!! Form::open(['action' =>['MembersController@update', $member->id], 'method' => 'POST']) !!}
        @method('PUT')
        @csrf
        <div class="col-xs-6 form-group">
            {{Form::label('mem_nom', 'Nom :')}}
            {{Form::text('mem_nom', $member->mem_nom, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_prenom', 'Prénom :')}}
            {{Form::text('mem_prenom', $member->mem_prenom, ['class' => 'form-control', 'placeholder' => 'Prénom'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_datenaissance', 'Date de naissance :')}}
            {!! Form::date('mem_datenaissance',Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('Y-m-d'), ['class' => 'form-control']) !!}

        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_numeroportable', 'Numéro de portable :')}}
            {{Form::text('mem_numeroportable', $member->mem_numeroportable, ['class' => 'form-control', 'placeholder' => 'Numéro de portable'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_email', 'E-mail :')}}
            {{Form::text('mem_email', $member->mem_email, ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_adresse', 'Adresse :')}}
            {{Form::text('mem_adresse', $member->mem_adresse, ['class' => 'form-control', 'placeholder' => 'Adresse'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_npa', 'NPA :')}}
            {{Form::number('mem_npa', $member->mem_npa, ['class' => 'form-control', 'placeholder' => 'NPA'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_localite', 'Localité :')}}
            {{Form::text('mem_localite', $member->mem_localite, ['class' => 'form-control', 'placeholder' => 'Localité'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_pays', 'Pays :')}}
            <select class="form-control" name="mem_pays">
                @foreach($pays as $paysNom)
                    <option value="{{ $member->mem_pays }}"  {{$member->mem_pays == $paysNom  ? 'selected' : '' }}>{{ $paysNom}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_numlicense', 'N° de licence :')}}
            {{Form::text('mem_numlicense', $member->mem_numlicense, ['class' => 'form-control', 'placeholder' => 'N° de Licence'])}}
        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('mem_entredate', 'Date d\'entrée :')}}
            {!! Form::date('mem_entredate',Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_entredate))->format('Y-m-d'), ['class' => 'form-control']) !!}

        </div>
        <div class="col-xs-6 form-group">
            {{Form::label('statut', 'Statut du membre :')}}
            <select class="form-control" name="statut">
                @foreach($statut as $stat)
                    <option value="{{ $member->statut }}"  {{$member->statut == $stat  ? 'selected' : '' }}>{{ $stat}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-6 form-group"></div>
        <div class="col-xs-6 form-group">
            {{Form::submit('Update', ['class' => 'btn btn-success'])}}
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
