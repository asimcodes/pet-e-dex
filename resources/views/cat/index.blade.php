@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Pet-é-dex: Cat Breeds</h1>

        <form class="mb-4" method="GET" action="{{ route('cat.index') }}">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for a breed..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if(isset($cats['error']))
            <div class="alert alert-danger">{{ $cats['error'] }}</div>
        @else
            <div class="row">
                @foreach($cats as $cat)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if(isset($cat->reference_image_id))
                                <img src="https://cdn2.thecatapi.com/images/{{ $cat->reference_image_id }}.jpg" class="card-img-top" alt="{{ $cat->name }}">
                            @else
                                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Image not available">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $cat->name }}</h5>
                                <p class="card-text">
                                    <strong>Origin:</strong> {{ $cat->origin ?? 'N/A' }}<br>
                                    <strong>Temperament:</strong> {{ $cat->temperament ?? 'N/A' }}
                                </p>
                                <a href="{{ route('cat.show', $cat->id) }}" class="btn btn-primary">Show More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
