@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                @session('success')
                <div class="alert alert-success" role="alert">
              {{ session('success')}}
           </div>
                @endsession
                <div class="card text-center">
</button>
                    <h5 class="card-header">Catégories</h5>
                    <table class="table m-auto my-3 w-75 card-body" border="1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Date</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $key => $cate)
                                <tr>
                                    <th scope="row">{{ $key+=1 }}</th>
                                    <td>{{ $cate->cat_name }}</td>
                                    <td>{{ $cate->created_at }}</td>
                                    <td>
                                <!-- <a href="{{route('category.show',$cate->id)}}" class="btn btn-primary">Modifier</a> -->
<button type="button" id="modier" class="btn btn-primary"  data-bs-whatever="@mdo">Modifier</button>
                                </td>
                                    <td>
                                    <a href="{{route('subCat',$cate->id)}}" id="delete"  class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
            <div class="col-sm-3">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="mb-3 card">
                        <h5 class="card-header">Catégories</h5>
                        <div class="card-body">
                            <label for="exampleInputPassword 1" class="form-label">Name Catégorie</label>
                            <input type="text" name="cat_name" class="form-control" id="exampleInputPassword1"
                                placeholder="Catégories ...">
                        </div>
                        <button type="submit" class="btn btn-info mb-2 w-50 m-auto">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Catégorie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" >
            @csrf
            @method('PUT')
            <input type="text" class="form-control" id="id" value="">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nom Catégorie :</label>
            <input type="text" class="form-control" id="cat-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<script>
    $("#modier").on('click',function(){
        $("#exampleModal").modal('show')
    })
</script>