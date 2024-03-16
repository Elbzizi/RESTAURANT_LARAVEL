@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Commandes précédentes</div>
                    <div class="card-body">
                        <div class="row justify-content-around gx-3  gy-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Ropas</th>
                                        <th scope="col">Quentity</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Total (DH)</th>
                                        <th scope="col">Adrisse</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comandes as $com)
                                        <tr>
                                            <td>{{ $com->user->name }}</td>
                                            <td>{{ $com->phone }}</td>
                                            <td>{{ $com->user->email }}</td>
                                            <td>{{ $com->date }}</td>
                                            <td>{{ $com->time }}</td>
                                            <td>{{ $com->meal->name }}</td>
                                            <td>{{ $com->qty }}</td>
                                            <td>{{ $com->meal->price }}</td>
                                            <td>{{ $com->meal->price * $com->qty }}</td>
                                            <td>{{ $com->adress }}</td>
                                            <td>{{ $com->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
