@extends('layout.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}">
@endsection

@section('contenu')
    <div class="container">
        @include('includes.info-box')
    </div>

    <form action="{{route('admin.blog.post.creation')}}" method="post">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input id="titre"  class="form-control {{$errors->has('titre') ? 'has-error' : ''}}" name="titre" type="text" value="{{Request::old('titre')}}">
        </div>
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input id="auteur"  class="form-control {{$errors->has('auteur') ? 'has-error' : ''}}" name="auteur" type="text" value="{{Request::old('auteur')}}">
        </div>
        <div class="form-group">
            <label for="categorie_select">Ajout categorie</label>
            <select name="select" id="select" class="form-control" >
                <!--FOREACH LOOP TO OUTPUT CATEGORI-->
                <option value="">Dummy</option>
            </select>
        </div>
        <button type="button">Ajouter</button>
        <div class="categorie-ajoutee">
            <ul></ul>
        </div>
        <input type="hidden" name="categories" id="categories">

        <div class="form-group">
            <label for="texte">Texte</label>
            <textarea name="texte" id="texte"  class="form-control {{$errors->has('texte') ? 'has-error' : ''}}" cols="30" rows="10" >{{Request::old('texte')}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-default">Envoyer</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">

    </form>


@endsection


@section('scripts')
    <script src="{{URL::secure('src/js/posts.js')}}"></script>
@endsection
