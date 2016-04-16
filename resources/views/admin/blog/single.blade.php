@extends('layout.admin-master')


@section('contenu')

    <div class="container">
        @include('includes.info-box')
    </div>

    <div class="row">
        <nav>
            <ul class="list-unstyled">
                <li>Editer</li>
                <li>Supprimer</li>
            </ul>
        </nav>
        <article>
            <h2>{{$post->titre}}</h2>
            <small>{{$post->auteur}} - {{$post->created_at}}</small>
            <p>{{$post->texte}}</p>
        </article>
    </div>
@endsection

