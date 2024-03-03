@extends('layouts.app')

@section('content')
<style>
    #showImage{
        width: 120px;
        height: 120px;
        border-radius: 50px
    }
</style>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-center text-light">Robas</div>
                    <form action="{{ route('Maes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body text-right">
                            <div class="form-group">
                                <label for="name">Nom de Rebas</label>
                                <input type="text" class="form-control" name="name" placeholder="Nom de Robas ..">
                            </div>
                            <div class="form-group">
                                <label for="name">Nom de Rebas</label>
                                <input type="text" class="form-control" name="name" placeholder="Nom de Robas ..">
                            </div>
                            <div class="form-group">
                                <label for="description">Description de Ropas</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Prix ($)</label>
                                    <input type="number" name="price" class="form-control" placeholder="Prix de Robas">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Choise Une Catégorie<span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <select name="category" class="form-control" required="">
                                        <option value="" selected="" disabled="">Choise Une Catégorie</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <div class="form-group">
                                        <label>Image de Ropas</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <img id="showImage" src="{{ url('Meals_Images/no_image.jpg') }}">
                                    </div>


                                    <br>
                                    <div class="form-group text-center">
                                        <button class="btn btn-danger" type="submit">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center">Menu</div>
                    <div class="card-body text-right">
                        <ul class="list-group">
                            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">Ajouter
                                catégorie</a>
                            <a href="{{ route('Maes.create') }}" class="list-group-item list-group-item-action">Rebas</a>

                            <a href="" class="list-group-item list-group-item-action">Commande client</a>

                        </ul>
                    </div>
                </div>
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
            </div>
        </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>



@endsection
