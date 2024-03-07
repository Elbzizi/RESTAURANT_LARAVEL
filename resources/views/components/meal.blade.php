@props(['image', 'name', 'description', 'id'])

<div class="card" style="width: 18rem;">
    <img src="{{ $image }}" class="card-img-top" alt="{{ $image }}">
    <div class="card-body">
        <h5 class="card-title">{{ $name }}</h5>
        <p class="card-text">{{ $description }}</p>
        <a href="#" class="btn btn-primary">Commandé</a>
    </div>
</div>
