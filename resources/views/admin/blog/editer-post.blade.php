@extends('layout.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}">
@endsection

@section('contenu')
    <div class="container">
        @include('includes.info-box')
    </div>

    <form action="{{route('admin.blog.post.update')}}" method="post">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input id="titre"  class="form-control {{$errors->has('titre') ? 'has-error' : ''}}" name="titre" type="text" value="{{Request::old('titre') ? Request::old('titre') : isset($post) ? $post->titre : ''}}">
        </div>
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input id="auteur"  class="form-control {{$errors->has('auteur') ? 'has-error' : ''}}" name="auteur" type="text" value="{{Request::old('auteur') ? Request::old('auteur') : isset($post) ? $post->auteur : ''}}">
        </div>
        <div class="form-group">
            <label for="categorie_select">Ajout categorie</label>
            <select name="select" id="select" class="form-control" >
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="button">Ajouter</button>
        <div class="categorie-ajoutee">
            <ul>
                @foreach($post_categories as $post_category)
                    <li><a href="#" id="{{ $post_category->id }}">{{ $post_category->nom }}</a></li>
                @endforeach
            </ul>
        </div>
        <input type="hidden" name="categories" id="categories" value="{{ implode(',', $post_categories_ids) }}">

        <div class="form-group">
            <label for="texte">Texte</label>
            <textarea name="texte" id="texte"  class="form-control {{$errors->has('texte') ? 'has-error' : ''}}" cols="30" rows="10" >{{Request::old('texte') ? Request::old('texte') : isset($post) ? $post->texte : ''}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-default">Envoyer</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <input type="hidden" name="post_id"  value="{{$post->id}}">

    </form>


@endsection


@section('scripts')
    <script src="{{URL::secure('src/js/posts.js')}}"></script>
@endsection
