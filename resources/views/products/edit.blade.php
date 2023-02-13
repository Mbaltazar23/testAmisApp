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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{route('productos.update', $product->id)}}">
                                @method('PATCH')
                                @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>description:</label>
                                    <input type="text" name="description" class="form-control" value="{{$product->description}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>stock:</label>
                                    <input type="text" name="stock" class="form-control" value="{{$product->stock}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>points:</label>
                                    <input type="text" name="points" class="form-control" value="{{$product->points}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Category:</label>
                                    <select class="form-select" name="category_id">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($categories as $category)}
                                        @if($product->category->id == $category->id)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
