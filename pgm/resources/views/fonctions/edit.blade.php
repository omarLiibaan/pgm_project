<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' =>['FonctionsController@update', $fonctions->id], 'method' => 'POST', 'id' => 'form']) !!}
            @method('PUT')
            @csrf
            <div class="col-xs-6 form-group">
            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('fon_nom', 'Nom de la fonction :')}}
                {{Form::text('fon_nom', $fonctions->fon_nom, ['class' => 'form-control', 'placeholder' => 'Chauffeur'])}}
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('cotisation', 'Cotisations')}}

            </div>
            <div class="col-xs-12 form-group">
            </div>
            <div class="col-xs-6 form-group">
                {{Form::label('fon_description', 'Description :')}}
                {{Form::textarea('fon_description', $fonctions->fon_description,  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
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
            @php ($i = 1)
            @foreach($champs as $champ )
                <div id="quiz" class="col-sm-3 form-group">
                    <p>Champs 1</p>
                    {{Form::label('inf_titre'.$i, 'Titre du champs :')}}
                    {{Form::text('inf_titre'.$i, $champ->cha_titre, ['class' => 'form-control', 'placeholder' => 'Permis de conduire'])}}
                    <p></p>
                    {{Form::label('inf_type'.$i, 'Type :')}}

                    <select class="form-control" id="inf_type{{$i}}" >
                        @foreach($type as $types)
                            <option value="{{ $types}}"  {{ $champ->cha_type == $types  ? 'selected' : '' }}>{{ $types}}</option>
                        @endforeach
                    </select>
                    <p></p>

                        @if($champ->cha_type === 'Champs simple')

                                <div id="champsSimple{{$i}}">
                                    {{Form::label('cha_format'.$i, 'Format :')}}
                                    <select class="form-control" id="inf_format{{$i}}" >
                                        @foreach($format as $formats)
                                            <option value="{{ $formats}}" {{ $champ->cha_format == $formats  ? 'selected' : '' }}>{{ $formats}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="listeDéroulante{{$i}}" style="display: none;" >
                                    {{Form::label('cha_'.$i.'val', 'Valeur :')}}
                                    {{Form::text('cha_'.$i.'val', '', ['class' => 'form-control', 'placeholder' => ' Permis A'])}}
                                    {{Form::text('cha_'.$i.'val2', '', ['class' => 'form-control', 'placeholder' => 'Permis B'])}}
                                    {{Form::text('cha_'.$i.'val3', '', ['class' => 'form-control', 'placeholder' => 'Permis Poids lourd'])}}
                                    {{Form::text('cha_'.$i.'val4', '', ['class' => 'form-control'])}}
                                    {{Form::text('cha_'.$i.'val5', '', ['class' => 'form-control'])}}
                                    {{Form::text('cha_'.$i.'val6', '', ['class' => 'form-control'])}}
                                </div>
                        @else
                                <div id="champsSimple{{$i}}" style="display: none;">
                                    {{Form::label('cha_format'.$i, 'Format :')}}
                                    <select class="form-control" name="inf_format{{$i}}" >
                                        @foreach($format as $formats)
                                            <option value="{{ $formats}}">{{ $formats}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="listeDéroulante{{$i}}"  >
                                    {{Form::label('cha_'.$i.'val', 'Valeur :')}}
                                    {{Form::text('cha_'.$i.'val', $champ->cha_val, ['class' => 'form-control', 'placeholder' => ' Permis A'])}}
                                    {{Form::text('cha_'.$i.'val2', $champ->cha_val2, ['class' => 'form-control', 'placeholder' => 'Permis B'])}}
                                    {{Form::text('cha_'.$i.'val3',$champ->cha_val3, ['class' => 'form-control', 'placeholder' => 'Permis Poids lourd'])}}
                                    {{Form::text('cha_'.$i.'val4', $champ->cha_val4, ['class' => 'form-control'])}}
                                    {{Form::text('cha_'.$i.'val5', $champ->cha_val5, ['class' => 'form-control'])}}
                                    {{Form::text('cha_'.$i.'val6', $champ->cha_val6, ['class' => 'form-control'])}}
                                </div>

                        @endif
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


@endsection
<script type="text/javascript">



    $(document).ready(function(){
        $('#inf_type1').on('change', function(){
            console.log('salut');
            if( $(this).val()==="Liste déroulante"){
                $("#listeDéroulante1").show();
                $("#champsSimple1").hide()
            }
            else{
                $("#champsSimple1").show();
                $("#listeDéroulante1").hide()
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

