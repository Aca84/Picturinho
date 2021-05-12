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
            {{-- <td>{{$post->title}}</td>  --}}
            <td class="" style="max-width: 500px;">{!!$post->body!!}</td> 
            <td>{{$post->created_at->format('d-m-yy H:i')}}</td> 
            <td>{{$post->user->name}}</td> 
            {{-- <td class="">{{$post->image}}</td>  --}}
            <td>
                <img src={{asset('/storage/images/'.$post->user['name'].'/'.$post->image)}} style="max-width: 150px;" alt="Slika">
            </td> 
            <td>
                <button type="button" class="btn-sm btn-warning">Edit</button>
            </td> 
            <td>
                <button type="button" class="btn-sm btn-danger">Delete</button>
            </td> 
        </tr>
    </tbody>
    @endforeach
    </table>
</div>