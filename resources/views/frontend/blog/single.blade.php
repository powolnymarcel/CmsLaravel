@extends('layout.principal')
@section('title')
    {{$post->titre}}
@endsection


@section('contenu')

    <div class="container">
        @include('includes.info-box')
    </div>

    <div class="row">

        <article>
            <h2>{{$post->titre}}</h2>
            <small>{{$post->auteur}} - {{$post->created_at}}</small>
            <p>{{$post->texte}}</p>
        </article>
    </div>
@endsection

