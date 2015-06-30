@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Blogs / Create </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('blogs.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea class="form-control" rows="3" name="body"/></textarea>
                </div>



            <a class="btn btn-default" href="{{ route('blogs.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@endsection