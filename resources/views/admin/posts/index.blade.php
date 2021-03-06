@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('posts.create') }}">
                Créer un nouvel article
            </a>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>TITRE</th>
                        <th>Catégorie</th>
                        <th>Date de création</th>
                        <th>Date de modification</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if($post->category)
                                {{ $post->category->title }}
                            @endif
                        </td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('posts.edit', ['id'=>$post->id]) }}">
                                Modifier
                            </a>
                            <form class="d-inline-block" action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <hr>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
