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

                                @if (count($meals) > 0)
                                    @foreach ($meals as $row)
                                        <tr>
                                            <th scope="row">{{ $row->id }}</th>
                                            <td><img src="{{ asset($row->image) }}" width="80"></td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>{{ $row->category }}</td>
                                            <td>{{ $row->price }}</td>

                                            <td><a href="{{ route('meal.edit', $row->id) }}"><button
                                                        class="btn btn-primary">Modifier</button></a></td>




                                            <td> <a href="{{ route('meal.delete', $row->id) }}" class="btn btn-danger"
                                                    id="delete">Supprimer</a></td>


                                        </tr>
                                    @endforeach
                                @else
                                    <p>Il n'y a pas de repas</p>
                                @endif


                            </tbody>
                        </table>
                        {{-- {{ $meals->links() }} --}}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">Menu</div>
                    <div class="card-body text-right ">
                        <ul class="list-group ">
                            <a href="{{ route('Maels.index') }}" class="list-group-item list-group-item-action ">Afficher
                                Ropas</a>
                            <a href="{{ route('Maels.create') }}" class="list-group-item list-group-item-action">Ajouter
                                Ropas</a>
                            <a href="/home" class="list-group-item list-group-item-action">Les commandes</a>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
