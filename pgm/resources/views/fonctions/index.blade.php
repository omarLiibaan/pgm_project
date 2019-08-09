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
                <th>Nom de la fonctions</th>
                <th>Description</th>
                <th>Champs supplémentaires</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($fonctions as $fonction )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('FonctionsController@show', $fonction->id)}}">{{$fonction->fon_nom}}</a></td></td>
                    <td class="click"><a href="{{action('FonctionsController@show', $fonction->id)}}">{{$fonction->fon_description}}</a></td>
                    <td class="click"><a href="{{action('FonctionsController@show', $fonction->id)}}">{{$fonction->cha_titre  }}</a></td>
                    <td class="click"><a href="{{action('FonctionsController@edit', $fonction->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('FonctionsController@destroy', $fonction->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('FonctionsController@create')}}" class="btn btn-primary">Ajouter une fonction</a>
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


