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
                <th>Nom de l'équipe</th>
                <th>Saison</th>
                <th>Catégorie</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($teams as $team )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('TeamsController@show', $team->id)}}">{{$team->tea_nom}}</a></td></td>
                    <td class="click"><a href="{{action('TeamsController@show', $team->id)}}">{{$team->sai_nomCategorie}}</a></td>
                    <td class="click"><a href="{{action('TeamsController@show', $team->id)}}">{{$team->cat_nom  }}</a></td>
                    <td class="click"><a href="{{action('TeamsController@edit', $team->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('TeamsController@destroy', $team->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('TeamsController@create')}}" class="btn btn-primary">Ajouter un cours (équipe)</a>
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


