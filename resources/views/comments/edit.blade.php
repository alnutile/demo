
    <div class="page-header">
        <h1>Comments / Edit </h1>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$comment->id}}</p>
                </div>
                <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea class="form-control" rows="3" name="body"/>{{$comment->body}}</textarea>
                </div>
                    <div class="form-group">
                     <label for="blog_id">BLOG_ID</label>
                     <input type="text" name="blog_id" class="form-control" value="{{$comment->blog_id}}"/>
                </div>



            <a class="btn btn-default" href="{{ route('comments.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


