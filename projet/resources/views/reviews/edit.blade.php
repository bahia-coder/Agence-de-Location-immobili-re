@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px;">
    <h2>Modifier mon avis</h2>

    <style>
        .review-form-container {
            background-color: #f8f8f8;
            padding: 20px;
            margin-top: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .review-form .form-group {
            margin-bottom: 15px;
        }

        .review-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .review-form textarea,
        .review-form input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: inherit;
        }

        .btn-submit {
            background-color: #8cc63f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #76a832;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px 15px;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="review-form-container">
        <form action="{{ route('avis.update', $review->id) }}" method="POST" class="review-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="comment">Commentaire</label>
                <textarea name="comment" id="comment" required>{{ $review->comment }}</textarea>
            </div>

            <div class="form-group">
                <label for="rating">Note (1 à 5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" value="{{ $review->rating }}">
            </div>

            <button type="submit" class="btn-submit">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
