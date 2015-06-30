@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Blogs / Edit </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$blog->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value="{{$blog->title}}"/>
                    @if(count($errors->get('title')))
                        @foreach ($errors->get('title') as $error)
                            <div class="alert alert-warning">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea class="form-control" rows="3" name="body"/>{{$blog->body}}</textarea>
                </div>



            <a class="btn btn-default" href="{{ route('blogs.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection