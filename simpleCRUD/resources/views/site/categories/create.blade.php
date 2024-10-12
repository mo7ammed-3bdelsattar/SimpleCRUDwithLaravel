@extends('site.app')
@section('title','Categories')


@section('content')
<h1 class="text-center my-3">Add Category</h1>
<div class="container py-5">


  @include('site.inc.errors')
  @include('site.inc.success')


  <form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputTitle" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" value="{{old('title')}}">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

  
</div>
@endsection