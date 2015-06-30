    <div class="row">

        <h3>Previous Comments</h3>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BODY</th>
                        <th>BLOG_ID</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->blog_id}}</td>

                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('comments.show', $comment->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>

