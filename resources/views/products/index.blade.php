@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>description</td>
                                    <td>stock</td>
                                    <td>points</td>}
                                    <td>category</td>
                                    <td colspan = 2>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}} </td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$product->points}}</td>}
                                        <td>{{$product->category->name}}</td>
                                        <td>
                                            <a href="{{ route('productos.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('productos.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
