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
                <h3>{{$member->mem_prenom}} {{$member->mem_nom}}</h3>
                <h6>Date de naissance: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('d.m.Y') }}</h6>
                <h6>Numero de portable: {{$member->mem_numeroportable}}</h6>
                <h6>Numero de maison: {{$member->mem_numfixe}}</h6>
                <h6>Email: {{$member->mem_email}}</h6>
                <h6>Nom rep. légal: {{$member->mem_nomparent}}</h6>
                <h6>Prénom rep. légal: {{$member->mem_prenomparent}}</h6>
                <h6>Adresse: {{$member->mem_adresse}}</h6>
                <h6>NPA: {{$member->mem_npa}}</h6>
                <h6>Localité: {{$member->mem_localite}}</h6>
                <h6>Pays: {{$member->mem_pays}}</h6>
                <h6>N° de Licence: {{$member->mem_numlicense}}</h6>
                <h6>Date d'entrée: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_entredate))->format('d.m.Y') }}</h6>
                <h6>Statut du membre: {{$member->statut}}</h6>
            </div>

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                        Action
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('MembersController@edit', $member->id)}}"><span class="icon-wrench"></span> Modify</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection




<!------ Include the above in your HEAD tag ---------->

<br><br>

