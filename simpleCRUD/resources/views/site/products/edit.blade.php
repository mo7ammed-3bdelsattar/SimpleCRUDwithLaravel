@extends('site.app')
@section('title','Product')


@section('content')
<h1 class="text-center my-3">Add Product</h1>
<div class="container py-5">


  @include('site.inc.errors')
  @include('site.inc.success')


  <form action="{{route('products.update',$product->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="exampleInputTitle" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" value="{{$product->title}}">
    </div>
    <div class="mb-3">
      <label for="exampleInputPrice" class="form-label">Price</label>
      <input name="price" type="text" class="form-control" value="{{$product->price}}">
    </div>
    <div class="mb-3">
      <label for="exampleInputDescription" class="form-label">Description</label>
      <textarea name="description" class="form-control">{{$product->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">update</button>
  </form>

  
</div>
@endsection