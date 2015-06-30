@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Comments / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$comment->id}}</p>
                </div>
                <div class="form-group">
                     <label for="body">BODY</label>
                     <p class="form-control-static">{{$comment->body}}</p>
                </div>
                    <div class="form-group">
                     <label for="blog_id">BLOG_ID</label>
                     <p class="form-control-static">{{$comment->blog_id}}</p>
                </div>
            </form>



            <a class="btn btn-default" href="{{ route('comments.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
            <form action="#/$comment->id" method="DELETE" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection