@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg bg-warning mb-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Demandes des clients</a>
                    </div>
                </nav>

                <div class="card ">
                    <div class="card-header">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('category.index') }}" class="btn btn-success me-md-2"
                                type="button">Catégories</a>
                            <a href="{{ route('Meal.create') }}" class="btn btn-warning" type="button">Ajouter un repas</a>
                            <a href="{{ route('Meal.index') }}" class="btn btn-primary" type="button">Afficher de repas</a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">Nom</th> --}}
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">date</th>
                                    <th scope="col">time</th>
                                    <th scope="col">Nom de ropas</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Prix de ropas($)</th>
                                    <th scope="col">Total ($)</th>
                                    {{-- <th scope="col">Address</th> --}}
                                    <th scope="col">Status </th>
                                    <th scope="col">Accépte</th>
                                    <th scope="col">Rejet de la demande</th>
                                    <th scope="col">Complétez la commande</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    {{-- <tr class=" bg-warning {{ $order->status == 'Refuse' ? 'bg-danger' : 'bg-success' }}"> --}}
                                    <tr
                                        class="
                                        @switch($order->status)
                                            @case('Refuse')
                                                table-danger
                                                @break
                                            @case('Confirmed')
                                                table-success
                                                @break
                                            @case('Pending')
                                                table-info
                                                @break
                                        @endswitch
                                    ">


                                        {{-- <td scope="col">{{ $order->user->name }}</td> --}}
                                        <td scope="col">{{ $order->user->email }}</td>
                                        <td scope="col">{{ $order->phone }}</td>
                                        <td scope="col">{{ $order->date }}</td>
                                        <td scope="col">{{ $order->time }}</td>
                                        <td scope="col">{{ $order->meal->name }}</td>
                                        <td scope="col">{{ $order->qty }}</td>
                                        <td scope="col">{{ $order->meal->price }}(DH)</td>
                                        <td scope="col">{{ $order->qty * $order->meal->price }}Total (DH)</td>
                                        {{-- <td scope="col">{{ $order->adress }}</td> --}}
                                        <td scope="col">{{ $order->status }} </td>
                                        <form action="{{ route('Order.update', $order->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <td scope="col"><button class="btn btn-primary" name="status"
                                                    value="Pending" type="submit">Accépte</button></td>
                                            <td scope="col"><button class="btn btn-danger" name="status" value="Refuse"
                                                    type="submit">Rejet</button></td>
                                            <td scope="col"><button class="btn btn-success" name="status"
                                                    value="Confirmed" type="submit">Complétez</button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
