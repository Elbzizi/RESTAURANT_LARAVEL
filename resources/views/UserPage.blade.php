@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Tout les Ropas
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom </th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Gatégorie</th>
                                    <th scope="col">Prix ($)</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Menu</div>
                    <div class="card-body text-right text-start ">
                        <ul class="list-group ">
                            @foreach ($categories as $item)
                                <a href="{{ route('Meal.index') }}"
                                    class="list-group-item btn btn-outline-success">{{ $item->cat_name }}
                                    Ropas</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
