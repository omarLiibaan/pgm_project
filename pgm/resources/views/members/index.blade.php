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
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>Numero de portable</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($members as $member )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('MembersController@show', $member->id)}}">{{$member->mem_nom}}</a></td></td>
                    <td class="click"><a href="{{action('MembersController@show', $member->id)}}">{{$member->mem_prenom}}</a></td>
                    <td class="click"><a href="{{action('MembersController@show', $member->id)}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('d.m.Y') }}</a></td>
                    <td class="click"><a href="{{action('MembersController@show', $member->id)}}">{{$member->mem_numeroportable}}</a></td>
                    <td class="click"><a href="{{action('MembersController@edit', $member->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('MembersController@destroy', $member->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('MembersController@create')}}" class="btn btn-primary">Ajouter un membre</a>
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


