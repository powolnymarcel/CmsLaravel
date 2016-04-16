@extends('layout.principal')
@section('title')
    Index du blog
@endsection

@section('contenu')
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                @include('includes.info-box')
            </div>
        <ul>
            @if(count($posts) ==0)
                <li>Pas de post</li>
                @else
                    @foreach($posts as $post)
                        <li>
                            <article>
                                <div>
                                    <h3>{{$post->titre}}</h3>
                                    <p>{{$post->texte}}
                                    </p>
                                    <span>{{$post->auteur}} </span>
                                    <span>{{$post->created_at}}</span>
                                    <a href="{{route('blog.single',['post_id'=>$post->id,'end'=>'frontend'])}}">Lire plus</a>
                                </div>
                            </article>
                        </li>
                    @endforeach
             @endif
            <section>
                @if($posts->lastPage()>1)
                    @if($posts->currentPage() !==1)
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    @endif
                        @if($posts->currentPage() !=$posts->lastPage())
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        @endif
                @endif
            </section>
        </ul>
        </div>
    </div>

@endsection