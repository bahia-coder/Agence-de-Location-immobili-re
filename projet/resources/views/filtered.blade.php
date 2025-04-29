@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">
        @if($selectedCity == 'all')
            All Properties
        @else
            Properties in {{ ucfirst($selectedCity) }}
        @endif
    </h1>

    <!-- Affichage des propriétés -->
    <div class="row">
        @foreach ($props as $prop)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($prop->image)
                        <img src="{{ asset('storage/' . $prop->image) }}" class="card-img-top" alt="Property image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $prop->title }}</h5>
                        <p class="card-text">
                            <strong>Price:</strong> ${{ $prop->price }}<br>
                            <strong>City:</strong> {{ $prop->city }}
                        </p>
                        <a href="{{ route('single.prop', $prop->id) }}" class="btn btn-primary">See Details</a>
                    </div>
                </div>
            </div>
        @endforeach

        @if($props->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    No properties found for your selection.
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
