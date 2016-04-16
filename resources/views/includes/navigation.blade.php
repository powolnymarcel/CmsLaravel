<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/quoteAppLaravel/public/">LeBlog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav  text-center">
                <li><a href="{{route('blog.index')}}">Blog</a></li>
                <li><a href="{{route('a-propos')}}">A propos</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
