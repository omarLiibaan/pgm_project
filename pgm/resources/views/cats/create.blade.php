@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' =>['CatsController@store'], 'method' => 'POST']) !!}
            @method('POST')
            @csrf
            <div class="col-xs-6 form-group">
                {{Form::label('my_checkbox', 'Sexe :')}}
                <p></p>
                <input type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme"> Femme
                <input type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme" checked> Homme
                <input type="radio" id="inlineCheckbox3" name="my_checkbox" value="Mixte"> Mixte
            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cat_nom', 'Nom de la catégorie :')}}
                {{Form::text('cat_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cat_description', 'Description :')}}
                {{Form::textarea('cat_description', '',  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cat_dateDebutEntre', 'Né entre le  :')}}
                {!! Form::date('cat_dateDebutEntre', '',  ['class' => 'form-control']) !!}

            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cat_dateFinEntre', 'Et le  :')}}
                {!! Form::date('cat_dateFinEntre', '',  ['class' => 'form-control']) !!}

            </div>

            <div class="col-xs-12 form-group">
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
