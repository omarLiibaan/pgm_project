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
                <th>Nom de la catégorie</th>
                <th>Spécificité</th>
                <th>Sexe</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($cats as $cat )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('CatsController@show', $cat->id)}}">{{$cat->cat_nom}}</a></td></td>
                    <td class="click"><a href="{{action('CatsController@show', $cat->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cat->cat_dateDebutEntre))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('CatsController@show', $cat->id)}}">{{$cat->cat_sexe}}</a></td>
                    <td class="click"><a href="{{action('CatsController@edit', $cat->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('CatsController@destroy', $cat->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('CatsController@create')}}" class="btn btn-primary">Ajouter une catégorie</a>
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


