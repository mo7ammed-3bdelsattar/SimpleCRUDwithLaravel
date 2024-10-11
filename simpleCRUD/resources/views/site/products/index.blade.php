@extends('site.app')
@section('title','Product')


@section('content')
<h1 class="text-center my-3">All Products</h1>
<a href="{{route('products.create')}}" class="btn btn-primary my-3">Add Product</a>
<div class="container my-4">
    <div class="row">
        @include('site.inc.success')
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cat_ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                <tr>
                    <td class="{{$product['is_new'] ? 'bg-success' :""  }}">{{$product->id}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->title}}</td>
                    @isset($product->offer)
                    <td>{{$product->price-$product->offer}}$ insted of <s>{{$product->price}}$</s></td>
                    @endisset
                    @empty($product->offer)
                    <td>{{$product->price}}$</td>
                    @endempty
                    <td>{{$product->description}}</td>
                    <td><a class="btn btn-success" href="{{route('products.show',$product->id)}}">Show</a></td>
                    <td><a class="btn btn-primary" href="{{route('products.edit',$product->id)}}">Edit</a></td>
                    <td>
                        <form action="{{route('products.destroy',$product->id)}}" method="POST">
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