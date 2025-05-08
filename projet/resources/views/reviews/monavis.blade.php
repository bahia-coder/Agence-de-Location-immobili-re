@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px;">
    <h2>Mon Avis</h2>

    <style>
        /* Styles spécifiques au formulaire */
        .review-form-container {
            background-color: #f8f8f8;
            padding: 20px;
            margin-top: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            max-width: 600px;
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
        .review-form select {
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

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
     <div class="review-form-container" style="margin: 60px auto; max-width: 600px;">
        @if ($review ?? null)
            <div class="review-display">
                <p><strong>Note :</strong> {{ $review->rating }}/5</p>
                <p><strong>Commentaire :</strong> {{ $review->comment }}</p>
              {{-- <a href="{{ route('avis.edit', $review->id) }}" class="btn-submit">Modifier mon avis</a> --}}

            </div>
        @else
            <form method="POST" action="{{ route('avis.store') }}" class="review-form">
                @csrf
                <div class="form-group">
                    <label for="comment">Votre avis :</label>
                    <textarea name="comment" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Note :</label>
                    <select name="rating">
                        <option value="">-- Choisir une note --</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} étoile(s)</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn-submit">Envoyer</button>
            </form>
        @endif
    </div>
</div>
@endsection