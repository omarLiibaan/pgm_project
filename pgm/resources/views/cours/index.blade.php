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
                <th>Nom</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($cours as $cour )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('CoursController@show', $cour->id)}}">{{$cour->cou_nom}}</a></td></td>
                    <td class="click"><a href="{{action('CoursController@show', $cour->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cour->cou_datedebut))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('CoursController@show', $cour->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cour->cou_datefin))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('CoursController@edit', $cour->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('CoursController@destroy', $cour->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('CoursController@create')}}" class="btn btn-primary">Ajouter un cours</a>
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


