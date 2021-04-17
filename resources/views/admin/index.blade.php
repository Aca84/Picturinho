@extends('layouts.app')
@section('content')
    
    <caption>List of Users</caption>
        <div class="table-responsive border-primary bg-light rounded">
            <table class="table"> 
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Created</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead> 
            @foreach ($users as $user)         
                <tbody>
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        {{ $user->role }}
                        {{-- <select name="role" id="">
                            <option value="{{ $user->role }}">{{ $user->role }}</option>  
                            <option value="{{ $user->role }}">user</option>  
                        </select>              --}}
                    </td>
                    <td>edit</td>
                    <td>delete</td>
                    </tr>
                </tbody>
            @endforeach
            </table>
        </div>
   
@endsection