<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 14:47
 */
?>
@extends('layouts.app')

<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@section('content')
    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span2" >

            </div>

            <div class="span8">

                <h3>{{$fonctions->fon_nom}}</h3>
                <h6>{{$fonctions->fon_description}}</h6>


                    <hr>
                    <h3>Champs</h3>
                    <h3></h3>
                   @foreach($champs as $champ )
                       <h6>{{$champ->cha_titre}}</h6>
                        <h6>Type: {{$champ->cha_type}}</h6>

                        @if($champ->cha_type === 'Liste déroulante')
                            <h6>Valeur: {{$champ->cha_val}}</h6>
                            <h6> {{$champ->cha_val2}}</h6>
                            <h6>{{$champ->cha_val3}}</h6>
                            <h6>{{$champ->cha_val4}}</h6>
                            <h6>{{$champ->cha_val5}}</h6>
                            <h6>{{$champ->cha_val6}}</h6>
                            <hr>
                        @else
                            <h6>Format: {{$champ->cha_format}}</h6>
                        @endif
                        <hr>
                    @endforeach
            </div>

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                        Action
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('FonctionsController@edit', $fonctions->id)}}"><span class="icon-wrench"></span> Modify</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection




<!------ Include the above in your HEAD tag ---------->

<br><br>

