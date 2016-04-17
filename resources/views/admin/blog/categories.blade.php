@extends('layout.admin-master')


@section('contenu')

    <div class="container">
        @include('includes.info-box')
    </div>

    <div class="row">
       <section id="categorie-admin">
           <form action="">
               <div class="input-group">
                   <label for="categorie_nom">Nom categorie</label>
                   <input type="text" name="nom" id="nom">
                   <button type="submit"  class="btn btn-default">Créer</button>
               </div>
           </form>
       </section>
        <section class="liste">
            @foreach($categories as $categorie)
            <article>
                <div class="categorie-info" data-id="{{$categorie->id}}">
                    <h3>{{$categorie->nom}}</h3>
                </div>
                <div class="edit">
                    <nav>
                        <ul>
                            <li class="categorie-edit">
                                <input type="text"/>
                            </li>
                            <li><a href="" class="btn btn-default">Editer</a></li>
                            <li><a href="" class="btn btn-danger">Supprimer</a></li>
                        </ul>
                    </nav>
                </div>
            </article>
            @endforeach
        </section>
        <section>
            @if($categories->lastPage()>1)
                @if($categories->currentPage() !==1)
                    <span class="glyphicon glyphicon-chevron-left"></span>
                @endif
                @if($categories->currentPage() !=$categories->lastPage())
                    <span class="glyphicon glyphicon-chevron-right"></span>
                @endif
            @endif
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        var token="{{Session::token()}}";
    </script>
    <script src="{{URL::to('src/js/categories.js')}}"></script>
@endsection
