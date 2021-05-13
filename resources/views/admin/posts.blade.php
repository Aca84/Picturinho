<div class="table-responsive border-primary bg-light rounded">

    <table class="table"> 
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Created</th>
                <th scope="col">User</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead> 
    @foreach ($posts as $post)         
    <tbody>
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td class="mw-auto">
                <a class="text-decoration-none text-dark " href="/posts/{{$post->id}}">{{$post->title}}</a>
            </td> 
            <td class="" style="max-width: 550px;">{!!$post->body!!}</td> 
            <td>{{$post->created_at->format('d-m-yy H:i')}}</td> 
            <td>{{$post->user->name}}</td> 
            <td>
                <img src={{asset('/storage/images/'.$post->user['name'].'/'.$post->image)}} style="max-width: 150px;" alt="Slika">
            </td> 
            <td>
                <button type="button" class="btn-sm border border-secondary">
                    <a href="/posts/{{$post->id}}/edit"><i class="far fa-edit"></i></a>
                </button>
            </td> 
            <td>
                <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $post->id)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn-sm border border-secondary"><i class="far fa-trash-alt"></i></button>
                </form>
            </td> 
        </tr>
    </tbody>
    @endforeach
    </table>
    
</div>