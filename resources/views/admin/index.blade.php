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

            <div class="col-md-6">
                <header>
                    <nav>
                        <ul>
                            <li ><a href="{{route('admin.blog.creation_post')}}" class="btn btn-default">Nouveau post</a></li>
                            <li ><a href="{{route('admin.blog.index')}}" class="btn btn-default">Voir tous les post</a></li>
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
                                                    <li><a href="{{route('admin.blog.post.editer',['post_id'=>$post->id])}}">Editer</a></li>
                                                    <li><a href="{{route('admin.blog.post.delete',['post_id'=>$post->id])}}">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </li>
  @endforeach                              <!-- SI des post -->

                        @endif

                    </ul>
                </section>
            </div>








            <div class="col-md-6">
                <header>
                    <nav>
                        <ul>
                            <li class="btn btn-default">Voir tous les messages</li>
                        </ul>
                    </nav>
                </header>
                <section>
                    <ul>
                        <!-- SI pas de messages -->
                        <li>Pas de messages</li>

                        <!-- SI des messages -->
                        <li>
                            <article data-message="Body" data-id="ID">
                                <a href="#modal3d" role="button" class="" data-toggle="modal">
                                    <button class="pull-right btn btn-default ">VRRRRR</span>
                                    </button>
                                </a>
                                <div>
                                    <h3>Sujet du message</h3>
                                    <p>Expediteur</p>
                                    <span>Date</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloremque
                                        eos error fugit non nostrum perspiciatis quaerat tempore. Architecto deserunt ea
                                        eligendi enim eos id, libero magni possimus vel vitae?
                                    </p>
                                    <div class="edit">
                                        <ul class="list-unstyled">
                                            <li><a href="">Voir le post</a></li>
                                            <li><a href="">Supprimer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </li>
                        <li>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>

    <!-- MODAL modalBancontact -->
    <div id="modal3d" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalBancontactLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="modalBancontactLabel">XXXXXXXXXXXXX
                  </h3>
                </div>
                <div class="modal-body">

                    <!-- CREDIT CARD FORM ENDS HERE -->
                </div>
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
