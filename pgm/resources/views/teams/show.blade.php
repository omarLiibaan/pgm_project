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
                @foreach($teams as $team)
                    <h3>{{$team->tea_nom}}</h3>
                    <h6>{{$team->sai_nomCategorie}}</h6>
                    <h6>{{$team->cat_nom}}</h6>
                    <hr>
                @endforeach
                <h3>Séances</h3>
                @foreach($seances as $seance )
                    <h6>Jours: {{$seance->sea_jours}}</h6>
                    <h6>Heure de début: {{$seance->sea_heureDebut}}</h6>
                    <h6>Heure de fin: {{$seance->sea_heureFin}}</h6>
                    <h6>Lieu: {{$seance->sea_lieu}}</h6>
                    <hr>
                @endforeach
                @foreach($cotis as $coti )
                    <h3>Cotisations</h3>
                    <h6>Somme de la cotisation: {{$coti->cot_somme}} CHF</h6>
                    <h6>Nombre de paiement: {{$coti->cot_nbPaiement}} Fois</h6>
                    <h6>Nombre d'échéance: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('d.m.Y') }}</h6>
                @endforeach
            </div>

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                        Action
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('TeamsController@edit', $team->id)}}"><span class="icon-wrench"></span> Modify</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection




<!------ Include the above in your HEAD tag ---------->

<br><br>

