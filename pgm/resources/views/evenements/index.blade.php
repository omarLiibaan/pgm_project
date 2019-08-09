<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 14:47
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nom de l'event</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Lieu</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($events as $event )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('EventsController@show', $event->id)}}">{{$event->eve_nom}}</a></td></td>
                    <td class="click"><a href="{{action('EventsController@show', $event->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($event->eve_datedebut))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('EventsController@show', $event->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($event->eve_datefin))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('EventsController@show', $event->id)}}">{{$event->eve_lieu}}</a></td></td>
                    <td class="click"><a href="{{action('EventsController@edit', $event->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('EventsController@destroy', $event->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('EventsController@create')}}" class="btn btn-primary">Ajouter un Évenements</a>
    </div>
@endsection
<style>
    .click a {
        display: block;
        color:inherit;
    }
    .click a:link{
        color:inherit;
    }
</style>


