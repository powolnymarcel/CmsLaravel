@extends('layout.principal')
@section('title')
    Index du blog
@endsection

@section('contenu')
    <div class="row">
        <div class="col-md-12">

            <article>
                <h3>Titre</h3>
                <span>Sous titre</span>
                <span>Auteur</span>
                <p>Description</p>
                <a href="#">Lire plus</a>
            </article>

            <section>
                Pagination
            </section>
        </div>
    </div>

@endsection