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
                <h3>{{$cats->cat_nom}}</h3>
                <h6>Né entre le  {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateDebutEntre))->format('d.m.Y') }} et le {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateFinEntre))->format('d.m.Y') }}</h6>
                <h6>Sexe : {{$cats->cat_sexe}}</h6>
                <h6>Description: {{$cats->cat_description}}</h6>
            </div>

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                        Action
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('CatsController@edit', $cats->id)}}"><span class="icon-wrench"></span> Modify</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection




<!------ Include the above in your HEAD tag ---------->

<br><br>

