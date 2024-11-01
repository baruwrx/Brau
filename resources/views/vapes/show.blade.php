@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $vape->name }}</h1>
        <p>{{ $vape->description }}</p>
        <p>Precio: {{ $vape->price }}</p>
        <p>Stock: {{ $vape->stock }}</p>

        <h2>Comentarios</h2>
        @if($comments->isEmpty())
            <p>No hay comentarios aún.</p>
        @else
            <ul>
                @foreach($comments as $comment)
                    <li>{{ $comment->content }} - <strong>{{ $comment->user->name }}</strong></li> 
                @endforeach
            </ul>
        @endif

        <h3>Dejar un Comentario</h3>
        <form action="{{ route('comments.store', $vape) }}" method="POST">
            @csrf
            <textarea name="content" required></textarea>
            <button type="submit">Enviar Comentario</button>
        </form>
    </div>
@endsection
