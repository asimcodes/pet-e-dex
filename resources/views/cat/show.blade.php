@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $cat->name }}</h1>

        <div class="card mb-4">
            <div class="card-body text-center">
                @if(isset($cat->reference_image_id))
                    <img src="https://cdn2.thecatapi.com/images/{{ $cat->reference_image_id }}.jpg" class="card-img-top" alt="{{ $cat->name }}" style="max-width: 300px; height: auto;">
                @else
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Image not available" style="max-width: 300px; height: auto;">
                @endif

                <p class="card-text mt-3">
                    <strong>Origin:</strong> {{ $cat->origin ?? 'Information not available' }}<br>
                    <strong>Temperament:</strong> {{ $cat->temperament ?? 'Information not available' }}<br>
                    <strong>Description:</strong> {{ $cat->description ?? 'Information not available' }}<br>
                    <strong>Life Span:</strong> {{ $cat->life_span ?? 'Information not available' }} years<br>
                    <strong>Weight:</strong> {{ $cat->weight->imperial ?? 'Information not available' }} lbs ({{ $cat->weight->metric ?? 'Information not available' }} kg)
                </p>

                <div class="btn-group" role="group" aria-label="External Links">
                    <a href="{{ $cat->cfa_url ?? '#' }}" class="btn btn-primary" target="_blank"
                       onclick="return this.href !== '#' ? true : alert('CFA Info not available.');">CFA Info</a>
                    <a href="{{ $cat->vetstreet_url ?? '#' }}" class="btn btn-secondary" target="_blank"
                       onclick="return this.href !== '#' ? true : alert('VetStreet Info not available.');">VetStreet Info</a>
                    <a href="{{ $cat->vcahospitals_url ?? '#' }}" class="btn btn-success" target="_blank"
                       onclick="return this.href !== '#' ? true : alert('VCA Info not available.');">VCA Info</a>
                    <a href="{{ $cat->wikipedia_url ?? '#' }}" class="btn btn-info" target="_blank"
                       onclick="return this.href !== '#' ? true : alert('Wikipedia Info not available.');">Wikipedia</a>
                </div>
            </div>
        </div>

        <a href="{{ route('cat.index') }}" class="mt-4 btn btn-secondary">Back to list</a>
    </div>
@endsection
