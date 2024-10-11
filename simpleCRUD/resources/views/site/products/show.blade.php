@extends('site.app')
@section('title','Product')


@section('content')
<h1 class="text-center my-3"> {{$product['title']}} </h1>
<div class="container my-4">
    <div class="row">
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cat_ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="{{$product->is_new ? 'bg-success' :""  }}">{{$product->id}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->title}}</td>
                    @isset($product->offer)
                    <td>{{$product->price-$product->offer}}$ insted of <s>{{$product->price}}$</s></td>
                    @endisset
                    @empty($product->offer)
                    <td>{{$product->price}}$</td>
                    @endempty
                    <td>{{$product->description}}</td>
                    <td><a class="btn btn-primary" href="{{route('products.edit',$product->id)}}">Edit</a></td>
                    <td>
                        <form action="{{route('products.destroy',$product->id)}}" method="POST">
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