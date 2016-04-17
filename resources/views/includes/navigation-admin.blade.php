<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/CmsLaravel/public/">CMS</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav  text-center">
                <li {{Request::is('admin') ? 'class=active': ''}}><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li {{Request::is('admin/blog/post*') ? 'class=active': ''}}><a href="{{route('admin.blog.index')}}">Posts</a></li>
                <li {{Request::is('admin/blog/categories*') || Request::is('admin/blog/categorie*') ? 'class=active': ''}}><a href="{{route('admin.blog.categories')}}">Categories</a></li>
                <li {{Request::is('admin/contact*') ? 'class=active': ''}}><a href="{{route('contact')}}">Messages</a></li>
                <li><a href="{{route('contact')}}">Logout</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
