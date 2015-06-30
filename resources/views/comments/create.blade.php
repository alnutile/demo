
    <div class="page-header">
        <h1>Comments / Create </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('comments.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea class="form-control" rows="3" name="body"/></textarea>

                    @if(count($errors->get('body')))
                        @foreach ($errors->get('body') as $error)
                            <div class="alert alert-warning">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                    <div class="form-group">
                     <input type="hidden" name="blog_id" class="form-control" value="{{ $blog->id }}"/>
                </div>



            <button class="btn btn-primary" type="submit" >Create</button>
            </form>
        </div>
    </div>


