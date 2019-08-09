@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Cours</h1>
            {!! Form::open(['action' =>['CoursController@update', $cours->id], 'method' => 'POST', 'id' => 'form']) !!}
            @method('PUT')
            @csrf

            <div class="col-sm-6 form-group"></div>
            <div class="col-sm-3 form-group">
                <h3>Cotisation</h3>
            </div>
            <div class="col-sm-3 form-group"></div>
            <div class="col-sm-12 form-group">

            </div>
            <div class="col-sm-3 form-group">
                {{Form::label('cou_nom', 'Nom du cours :')}}
                {{Form::text('cou_nom', $cours->cou_nom, ['class' => 'form-control', 'placeholder' => 'Nom du cours'])}}
            </div>
            <div class="col-sm-3 form-group"></div>
            <div class="col-sm-3 form-group">
                @foreach($cotis as $coti )
                    {{Form::label('cot_somme', 'Somme :')}}
                    {{Form::text('cot_somme',$coti->cot_somme, ['class' => 'form-control', 'placeholder' => 'Somme'])}}
                @endforeach
            </div>
            <div class="col-sm-12 form-group"></div>
            <div class="col-sm-12 form-group"></div>
            <div class="col-sm-3 form-group">
                {{Form::label('cou_datedebut', 'Date de début :')}}
                {!! Form::date('cou_datedebut', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datedebut))->format('Y-m-d'),  ['class' => 'form-control'])!!}
            </div>
            <div class="col-sm-3 form-group"></div>
            <div class="col-sm-3 form-group">
                @foreach($cotis as $coti )
                    {{Form::label('cot_nbPaiement', 'Paiement en :')}}
                    {{Form::number('cot_nbPaiement', $coti->cot_nbPaiement, ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
                @endforeach
            </div>
            <div class="col-sm-12 form-group"></div>
            <div class="col-sm-3 form-group">
                {{Form::label('cou_datefin', 'Date de fin :')}}
                {!! Form::date('cou_datefin', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datefin))->format('Y-m-d'),  ['class' => 'form-control'])!!}
            </div>
            <div class="col-sm-3 form-group"></div>
            <div class="col-sm-3 form-group">
                @foreach($cotis as $coti )
                    {{Form::label('cot_echeance', 'Echéance de paiement :')}}
                    {!! Form::date('cot_echeance', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('Y-m-d'),  ['class' => 'form-control'])!!}
                @endforeach
            </div>
            <div class="col-sm-12 form-group">
                <p></p>
            </div>
            <div class="col-sm-3 form-group">
                <input type="button" value="Ajouter une séance" class="btn btn-primary"  onclick="javascript: addSeance();"/>
            </div>
            <div class="col-sm-3 form-group"></div>
            <div class="col-sm-12 form-group">
                <p></p>
            </div>
            @php ($i = 1)
            @foreach($seances as $seance )

            <div id="quiz" class="col-sm-3 form-group">
                <p>Séance</p>
                {{Form::label('sea_jour'.$i, 'Jours :')}}
                {{Form::text('sea_jour'.$i, $seance->sea_jours, ['class' => 'form-control', 'placeholder' => 'Jours'])}}
                <p></p>
                {{Form::label('sea_heureDebut'.$i, 'Heures de début:')}}
                {!! Form::time('sea_heureDebut'.$i,$seance->sea_heureDebut, ['class' => 'form-control']) !!}
                {{Form::label('sea_heureFin'.$i, 'Heures de fin :')}}
                {!! Form::time('sea_heureFin'.$i,$seance->sea_heureFin, ['class' => 'form-control']) !!}

                <p></p>
                {{Form::label('sea_lieu'.$i, 'Lieu :')}}
                {!! Form::text('sea_lieu'.$i,$seance->sea_lieu, ['class' => 'form-control']) !!}
            </div>
                @php ($i++)
            @endforeach
            <div class="col-sm-12 form-group">
                <p></p>
            </div>
            <div id="groupeSeance">
                <p></p>
            </div>
            <div class="col-sm-12 form-group">
                <p></p>
            </div>
            <div class="col-sm-6 form-group">
                {{Form::submit('Modifier', ['class' => 'btn btn-primary btn-block', 'id' => 'btn'] )}}
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
<script>
    var limit = 4; // Max questions
    var count = 2; // There are 4 questions already

    function addSeance()
    {
        // Get the quiz form element
        var quiz = document.getElementById('quiz');
        var form = document.getElementById('form');


        // Good to do error checking, make sure we managed to get something
        if (quiz)
        {
            if (count < limit)
            {
                // Create a new <p> element
                var newP = document.createElement('p');
                var newDiv = document.createElement('div');
                var jours = document.createElement("LABEL");
                var heureDebut = document.createElement("LABEL");
                var heureFin = document.createElement("LABEL");
                var lieu = document.createElement("LABEL");
                var newP2 = document.createElement('p');
                var newP3 = document.createElement('p');
                var newP4 = document.createElement('p');
                newDiv.className = "col-sm-3 form-group";
                newP.innerHTML = 'Séance ' + (count + 1);
                jours.innerHTML = 'Jours :';
                heureDebut.innerHTML = 'Heure de début :';
                heureFin.innerHTML = 'Heure de fin :';
                lieu.innerHTML = 'Lieu : '

                // Create the new text box
                var newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'sea_jour' + (count + 1);
                newInput.className = 'form-control';

                var newInput2 = document.createElement('input');
                newInput2.type = 'time';
                newInput2.name = 'sea_heureDebut'+ (count + 1);
                newInput2.className = 'form-control';

                var newInput3 = document.createElement('input');
                newInput3.type = 'time';
                newInput3.name = 'sea_heureFin'+ (count + 1);
                newInput3.className = 'form-control';

                var newInput4 = document.createElement('input');
                newInput4.type = 'text';
                newInput4.name = 'sea_lieu'+ (count + 1);
                newInput4.className = 'form-control';

                // Good practice to do error checking
                if (newInput && newP)
                {
                    // Add the new elements to the form
                    newDiv.appendChild(newP);
                    newDiv.appendChild(jours);
                    newDiv.appendChild(newInput);
                    newDiv.appendChild(newP3);
                    newDiv.appendChild(heureDebut);
                    newDiv.appendChild(newInput2);
                    newDiv.appendChild(newP4);
                    newDiv.appendChild(heureFin);
                    newDiv.appendChild(newInput3);
                    newDiv.appendChild(newP2);
                    newDiv.appendChild(lieu);
                    newDiv.appendChild(newInput4);

                    form.appendChild(newDiv);
                    var a = document.getElementById("groupeSeance");
                    a.parentNode.insertBefore(newDiv,a);
                    // Increment the count
                    count++;
                }

            }
            else
            {
                alert('Question limit reached');
            }
        }
    }
</script>
