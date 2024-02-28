@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                @session('success')
                <div class="alert alert-success" role="alert">
              {{ session('success')}}
           </div>
                @endsession
                <div class="card text-center">

                    <h5 class="card-header">Catégories</h5>
                    <table class="table m-auto my-3 w-75 card-body" border="1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Date</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $cate)
                                <tr>
                                    <th scope="row">{{ $cate->id }}</th>
                                    <td>{{ $cate->cat_name }}</td>
                                    <td>{{ $cate->created_at }}</td>
                                    <td><a href="{{route('category.show',$cate->id)}}" class="btn btn-primary">Modifier</a></td>
                                    <td><form action="{{route('category.destroy',$cate->id)}}" method="post" >
                                     @csrf
                                    @DELETE
                                        <button  class="btn btn-danger">Supprimer</button></form></td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
            <div class="col-sm-3">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="mb-3 card">
                        <h5 class="card-header">Catégories</h5>
                        <div class="card-body">
                            <label for="exampleInputPassword 1" class="form-label">Name Catégorie</label>
                            <input type="text" name="cat_name" class="form-control" id="exampleInputPassword1"
                                placeholder="Catégories ...">
                        </div>
                        <button type="submit" class="btn btn-info mb-2 w-50 m-auto">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
