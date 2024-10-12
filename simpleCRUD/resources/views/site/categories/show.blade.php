@extends('site.app')
@section('title','category')


@section('content')
<h1 class="text-center my-3"> {{$category['title']}} </h1>
<div class="container my-4">
    <div class="row">
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td><a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">Edit</a></td>
                    <td>
                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection