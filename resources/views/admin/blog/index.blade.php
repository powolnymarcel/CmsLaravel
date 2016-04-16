@extends('layout.admin-master')
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/modal.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
@endsection

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="container">
                @include('includes.info-box')
            </div>

            <div class="col-md-12">
                <header>
                    <nav>
                        <ul>
                            <li ><a href="{{route('admin.blog.creation_post')}}" class="btn btn-default">Nouveau post</a></li>
                        </ul>
                    </nav>
                </header>
                <section>
                    <ul>
                        @if(count($posts) ==0)
                                <!-- SI pas de post -->
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
                                            <div class="edit">
                                                <ul class="list-unstyled">
                                                    <li><a href="{{route('admin.blog.post',['post_id'=>$post->id,'end'=>'admin'])}}">Voir le post</a></li>
                                                    <li><a href="">Editer</a></li>
                                                    <li><a href="">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endforeach                              <!-- SI des post -->

                                @endif

                    </ul>
                </section>
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
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        var token="{{Session::token()}}";
    </script>
    <script src="{{URL::secure('src/js/modal.js')}}"></script>
    <script src="{{URL::secure('src/js/contact_messages.js')}}"></script>
@endsection
