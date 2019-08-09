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
                <th>Nom de la saison</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($saisons as $saison )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('SaisonsController@show', $saison->id)}}">{{$saison->sai_nomCategorie}}</a></td></td>
                    <td class="click"><a href="{{action('SaisonsController@show', $saison->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateDebut))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('SaisonsController@show', $saison->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateFin))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('SaisonsController@edit', $saison->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('SaisonsController@destroy', $saison->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('SaisonsController@create')}}" class="btn btn-primary">Ajouter une saison</a>
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


