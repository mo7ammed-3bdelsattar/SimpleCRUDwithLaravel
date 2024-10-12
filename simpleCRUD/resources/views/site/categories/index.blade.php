@extends('site.app')
@section('title','Categories')

@section('content')
<h1 class="text-center my-3">All categories</h1>
<a href="{{route('categories.create')}}" class="btn btn-primary my-3">Add category</a>
<div class="container my-4">
    <div class="row">
        @include('site.inc.success')
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td><a class="btn btn-success" href="{{route('categories.show',$category->id)}}">Show</a></td>
                    <td><a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">Edit</a></td>
                    <td>
                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection