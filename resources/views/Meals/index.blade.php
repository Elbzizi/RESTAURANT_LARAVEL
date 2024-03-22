@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">Tout les Ropas
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
                                @foreach ($meals as $meal)
                                    <tr>
                                        <th scope="row">{{ $meal->id }}</th>
                                        <td><img src="{{ asset($meal->image) }}" width="80"></td>
                                        <td>{{ $meal->name }}</td>
                                        <td>{{ $meal->description }}</td>
                                        <td>{{ $meal->category->cat_name }}</td>
                                        <td>{{ $meal->price }}</td>
                                        <td><a href="{{ route('Meal.edit', $meal->id) }}"
                                                class="btn btn-primary">Modifier</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('Meal.supp', $meal->id) }}" id="delete"
                                                class="btn btn-danger delete-btn">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $meals->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">Menu</div>
                    <div class="card-body text-right ">
                        <ul class="list-group ">
                            <a href="{{ route('Meal.index') }}" class="list-group-item list-group-item-action ">Afficher
                                Ropas</a>
                            <a href="{{ route('Meal.create') }}" class="list-group-item list-group-item-action">Ajouter
                                Ropas</a>
                            <a href="/home" class="list-group-item list-group-item-action">Les commandes</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
