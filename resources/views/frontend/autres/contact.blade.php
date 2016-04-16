@extends('layout.principal')
@section('title')
    Contact
@endsection
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}">
@endsection

@section('contenu')
    <div class="row">
        <div class="col-md-12">
            @include('includes.info-box')

            <form action="" method="post" id="contact-form">
                <div class="input-group">
                    <label for="nom">Vote nom</label>
                    <input type="text" name="nom" id="nom">
                </div>
                <div class="input-group">
                    <label for="email">Vote email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="input-group">
                    <label for="sujet">Vote sujet</label>
                    <input type="text" name="sujet" id="sujet">
                </div>
                <div class="input-group">
                    <label for="message">Vote sujet</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-block btn-success">Envoyer</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>

@endsection