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

                        @if (count($errors) > 0)
                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <p> {{ $error }}
                                            <p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-5">
                                        <div class="col-12">
                                            <img src="{{ asset($meal->image) }}" class="product-image img-thumbnail"
                                                alt="Product Image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7">

                                        <strong>Gategorie :</strong> {{ $meal->category->cat_name }} <br /><br>
                                        <strong>Nom de Ropas :</strong> {{ $meal->name }} <br /><br>
                                        <strong>Prix :</strong> {{ $meal->price }} <br /><br>
                                        <strong>Description :</strong>
                                        <p>{{ $meal->description }} </p><br /><br>
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
                        @auth
                            <form method="post" action="{{ route('Order.store') }}">
                                @csrf
                                <label for="">Nome de utilisateur :</label> <b>{{ Auth::user()->name }}</b> <br>
                                <label for="">E-mail :</label> <b>{{ Auth::user()->email }}</b>
                                <input type="hidden" name="meal_id" value="{{ $meal->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="status" value="pending">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telephone :</label>
                                    <input type="phone" class="form-control" id="exampleInputEmail1" name="phone"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Date :</label>
                                    <input type="date" name="date" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Time :</label>
                                    <input type="time" name="time" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Quentity :</label>
                                    <input type="number" name="qty" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Adrisse :</label>
                                    <textarea name="adress" class="form-control" id="exampleInputPassword1" cols="15" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Commandé</button>
                            </form>
                        @endauth
                        @guest
                            <p> se connecter pour commander </p>
                            <a href="{{ route('login') }}" class="btn btn-primary">se connecter</a>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
