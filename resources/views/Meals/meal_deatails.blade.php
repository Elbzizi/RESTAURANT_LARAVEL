@extends('layouts.app')

@section('content')
    <style>
        .product-image {
            width: 250px;
            height: 250px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Le Ropas<br>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif


                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-5">
                                        <div class="col-12">
                                            <img src="{{ asset($meal->image) }}" class="product-image img-thumbnail" alt="Product Image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7">

                                        <strong>Gategorie :</strong> {{ $meal->category->cat_name }} <br /><br>
                                        <strong>Nom de Ropas :</strong> {{ $meal->name }} <br /><br>
                                        <strong>Prix :</strong> {{ $meal->price }} <br /><br>
                                        <strong>Description :</strong> <p>{{ $meal->description }} </p><br /><br>

                                        {{-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots
                                                Review</h3>
                                            <h3 class="my-3">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby
                                                sweater eu banh mi, qui irure terr.</p>

                                            <hr>
                                            <h4>Available Colors</h4> --}}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- /.content -->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Commandé</div>
                    <div class="card-body text-right text-start ">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
