@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Welcome</h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <ul class="list-unstyled">
                @foreach($blogs as $blog)
                    <li>
                        <h3><a href="/blogs/{{$blog->getSlug()}}">{{ $blog->title }}</a></h3>
                        <p>
                            <?php echo substr($blog->body, 0, 120); ?>
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <h2>About Me</h2>
            <p>Intro to Laravel...</p>
        </div>
    </div>


@endsection