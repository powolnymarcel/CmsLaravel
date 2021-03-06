@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/commun.css')}}">
@append

@if(Session::has('fail'))
    <section class="info-box fail alert alert-danger">
        {{Session::get('fail')}}
    </section>

    @endif
@if(Session::has('success'))
    <section class="info-box success alert alert-success">
        {{Session::get('success')}}
    </section>
@endif

@if(count($errors)>0)

    <section class="info-box fail alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
    </section>
@endif
