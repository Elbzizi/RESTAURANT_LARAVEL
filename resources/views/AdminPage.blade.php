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
                            <button class="btn btn-success me-md-2" type="button">Ajouter une nouvelle catégorie</button>
                            <button class="btn btn-warning" type="button">Ajouter un repas</button>
                            <button class="btn btn-primary" type="button">Afficher de repas</button>

                        </div>
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Téléphone</th>

                                    <th scope="col">date</th>
                                    <th scope="col">time</th>
                                    <th scope="col">Nom de ropas</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Prix de ropas($)</th>
                                    <th scope="col">Total ($)</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status </th>
                                    <th scope="col">Accépte</th>
                                    <th scope="col">Rejet de la demande</th>
                                    <th scope="col">Complétez la commande</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
