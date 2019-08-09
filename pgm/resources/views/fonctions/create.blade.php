<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' =>['FonctionsController@store'], 'method' => 'POST']) !!}
            @method('POST')
            @csrf
            <div class="col-xs-6 form-group">
            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('fon_nom', 'Nom de la fonction :')}}
                {{Form::text('fon_nom', '', ['class' => 'form-control', 'placeholder' => 'Chauffeur'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cotisation', 'Cotisations')}}

            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('fon_description', 'Description :')}}
                {{Form::textarea('fon_description', '',  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-sm-3 form-group">
                <input type="button" value="Ajouter un champs" class="btn btn-primary"  onclick="javascript: addChamps();"/>
            </div>
            <div class="col-sm-3 form-group"></div>
            <div class="col-sm-12 form-group">
                <p></p>
            </div>
            <div id="quiz" class="col-sm-3 form-group">
                <p>Champs 1</p>
                {{Form::label('inf_titre', 'Titre du champs :')}}
                {{Form::text('inf_titre', '', ['class' => 'form-control', 'placeholder' => 'Permis de conduire'])}}
                <p></p>
                {{Form::label('inf_type', 'Type :')}}
                {!! Form::select('inf_type', array('Champs simple' => 'Champs simple', 'Liste déroulante' => 'Liste déroulante'), 'Champs simple', ['class' => 'form-control', 'id' => 'inf_type']); !!}

                <p></p>
                <div id="champsSimple">
                    {{Form::label('cha_format', 'Format :')}}
                    {!! Form::select('cha_format', array('Lettres et chiffres' => 'Lettres et chiffres', 'Chiffres uniquement' => 'Chiffres uniquement', 'Dates' => 'Dates'), 'Lettres et chiffres', ['class' => 'form-control']); !!}
                </div>
                <div id="listeDéroulante" style=" display: none;">
                    {{Form::label('cha_val', 'Valeur :')}}
                    {{Form::text('cha_val', '', ['class' => 'form-control', 'placeholder' => ' Permis A'])}}
                    {{Form::text('cha_val2', '', ['class' => 'form-control', 'placeholder' => 'Permis B'])}}
                    {{Form::text('cha_val3', '', ['class' => 'form-control', 'placeholder' => 'Permis Poids lourd'])}}
                    {{Form::text('cha_val4', '', ['class' => 'form-control'])}}
                    {{Form::text('cha_val5', '', ['class' => 'form-control'])}}
                    {{Form::text('cha_val6', '', ['class' => 'form-control'])}}
                </div>
            </div>
            <div id="quiz" class="col-sm-3 form-group" >
                <p>Champs 2</p>
                {{Form::label('inf_titre2', 'Titre du champs :')}}
                {{Form::text('inf_titre2', '', ['class' => 'form-control', 'placeholder' => 'Permis de conduire'])}}
                <p></p>
                {{Form::label('inf_type2', 'Type :')}}
                {!! Form::select('inf_type2', array('Champs simple' => 'Champs simple', 'Liste déroulante' => 'Liste déroulante'), 'Liste déroulante', ['class' => 'form-control', 'id' => 'inf_type2']); !!}

                <p></p>
                <div id="champsSimple2" style=" display: none;">
                    {{Form::label('cha_format2', 'Format :')}}
                    {!! Form::select('cha_format2', array('Lettres et chiffres' => 'Lettres et chiffres', 'Chiffres uniquement' => 'Chiffres uniquement', 'Dates' => 'Dates'), 'Lettres et chiffres', ['class' => 'form-control']); !!}
                </div>
                <div id="listeDéroulante2">
                    {{Form::label('cha_2val', 'Valeur :')}}
                    {{Form::text('cha_2val', '', ['class' => 'form-control', 'placeholder' => ' Permis A'])}}
                    {{Form::text('cha_2val2', '', ['class' => 'form-control', 'placeholder' => 'Permis B'])}}
                    {{Form::text('cha_2val3', '', ['class' => 'form-control', 'placeholder' => 'Permis Poids lourd'])}}
                    {{Form::text('cha_2val4', '', ['class' => 'form-control'])}}
                    {{Form::text('cha_2val5', '', ['class' => 'form-control'])}}
                    {{Form::text('cha_2val6', '', ['class' => 'form-control'])}}
                </div>
            </div>
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
                {{Form::submit('Ajouter', ['class' => 'btn btn-primary btn-block', 'id' => 'btn'] )}}
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


@endsection
<script type="text/javascript">



    $(document).ready(function(){
        $('#inf_type').on('change', function(){
            console.log('salut');
            if( $(this).val()==="Liste déroulante"){
                $("#listeDéroulante").show();
                $("#champsSimple").hide()
            }
            else{
                $("#champsSimple").show();
                $("#listeDéroulante").hide()
            }
        });

    });
    $(document).ready(function(){
        $('#inf_type2').on('change', function(){
            console.log('salut');
            if( $(this).val()==="Liste déroulante"){
                $("#listeDéroulante2").show();
                $("#champsSimple2").hide()
            }
            else{
                $("#champsSimple2").show();
                $("#listeDéroulante2").hide()
            }
        });

    });


</script>

<script>
    var limit = 4; // Max questions
    var count = 2; // There are 4 questions already



    function addChamps()
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
                var titre = document.createElement("LABEL");
                var type = document.createElement("LABEL");
                var format = document.createElement("LABEL");
                var valeur = document.createElement("LABEL");
                var newP2 = document.createElement('p');
                var newP3 = document.createElement('p');
                var newP4 = document.createElement('p');
                newDiv.className = "col-sm-3 form-group";
                newP.innerHTML = 'Champs ' + (count + 1);
                titre.innerHTML = 'Titre du champs :';
                type.innerHTML = 'Type :';
                format.innerHTML = 'Format :';
                valeur.innerHTML = 'Valeur : '

                // Create the new text box
                var newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'inf_titre' + (count + 1);
                newInput.className = 'form-control';
                var array = ["Champs simple","Liste déroulante"];
                var array2 = [ 'Lettres et chiffres','Chiffres uniquement', 'Dates'];
                var newInput2 = document.createElement('select');
                newInput2.id = 'inf_type' + (count + 1);
                newInput2.name = 'inf_type'+ (count + 1);
                newInput2.className = 'form-control';
                for(var i = 0; i< array.length; i++){
                    var option = document.createElement('option');
                    option.value = array[i];
                    option.text = array[i];
                    newInput2.appendChild(option);
                }
                var champsSimple = document.createElement('div');
                champsSimple.id = 'champsSimple' + (count + 1);
                var listeD = document.createElement('div');
                listeD.id  = 'listeDéroulante' + (count + 1);
                listeD.style = 'display : none';
                var newInput3 = document.createElement('select');
                newInput3.id = 'cha_format' + (count + 1);
                newInput3.name = 'cha_format'+ (count + 1);
                newInput3.className = 'form-control';
                for(var j = 0; j< array2.length; j++){
                    var option2 = document.createElement('option');
                    option2.value = array2[j];
                    option2.text = array2[j];
                    newInput3.appendChild(option2);
                }

                var newInput4 = document.createElement('input');
                newInput4.type = 'text';
                newInput4.name = 'cha_'+ (count + 1) + 'val';
                newInput4.className = 'form-control';
                var newInput5 = document.createElement('input');
                newInput5.type = 'text';
                newInput5.name = 'cha_'+ (count + 1) + 'val2';
                newInput5.className = 'form-control';
                var newInput6 = document.createElement('input');
                newInput6.type = 'text';
                newInput6.name = 'cha_'+ (count + 1) + 'val3';
                newInput6.className = 'form-control';
                var newInput7 = document.createElement('input');
                newInput7.type = 'text';
                newInput7.name = 'cha_'+ (count + 1) + 'val4';
                newInput7.className = 'form-control';
                var newInput7 = document.createElement('input');
                newInput7.type = 'text';
                newInput7.name = 'cha_'+ (count + 1) + 'val5';
                newInput7.className = 'form-control';
                var newInput8 = document.createElement('input');
                newInput8.type = 'text';
                newInput8.name = 'cha_'+ (count + 1) + 'val6';
                newInput8.className = 'form-control';

                // Good practice to do error checking
                if (newInput && newP)
                {
                    // Add the new elements to the form
                    newDiv.appendChild(newP);
                    newDiv.appendChild(titre);
                    newDiv.appendChild(newInput);
                    newDiv.appendChild(newP3);
                    newDiv.appendChild(type);
                    newDiv.appendChild(newInput2);
                    newDiv.appendChild(newP4);
                    champsSimple.appendChild(format);
                    champsSimple.appendChild(newInput3);
                    newDiv.appendChild(champsSimple);
                    newDiv.appendChild(newP2);

                    listeD.appendChild(valeur);
                    listeD.appendChild(newInput4);

                    listeD.appendChild(newInput5);
                    listeD.appendChild(newInput6);
                    listeD.appendChild(newInput7);
                    listeD.appendChild(newInput8);
                    newDiv.appendChild(listeD);
                    //form.appendChild(newDiv);
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
        $(document).ready(function(){
            $('#inf_type3').on('change', function(){
                console.log('salut');
                if( $(this).val()==="Liste déroulante"){
                    $("#listeDéroulante3").show();
                    $("#champsSimple3").hide()
                }
                else{
                    console.log('justin');
                    $("#champsSimple3").show();
                    $("#listeDéroulante3").hide()
                }
            });

        });
        $(document).ready(function(){
            $('#inf_type4').on('change', function(){
                console.log('salut');
                if( $(this).val()==="Liste déroulante"){
                    $("#listeDéroulante4").show();
                    $("#champsSimple4").hide()
                }
                else{
                    console.log('justin');
                    $("#champsSimple4").show();
                    $("#listeDéroulante4").hide()
                }
            });

        });
    }
</script>
<script>


</script>

