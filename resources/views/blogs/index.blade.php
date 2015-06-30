@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Blogs</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>BODY</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->body}}</td>

                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('blogs.show', $blog->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

            {!! $blogs->appends(Request::except('page'))->render($customPagination) !!}

            <br>

            <a class="btn btn-success" href="{{ route('blogs.create') }}">Create</a>
        </div>
    </div>


@endsection