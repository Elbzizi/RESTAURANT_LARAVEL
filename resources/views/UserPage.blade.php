@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Tout les Ropas {{ count($meals) }} <br>
                        @isset($name)
                           le nom de catégorie : {{ $name }} 
                        @endisset
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @foreach ($meals as $meal)
                            <x-meal :image="$meal->image" :name="$meal->name" :description="$meal->description" :id="$meal->id" />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-success text-light text-center ">Menu</div>
                    <div class="card-body text-right text-start ">
                        <ul class="list-group ">
                            @foreach ($categories as $item)
                                <a href="{{ route('cat_pro', $item->id) }}"
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
