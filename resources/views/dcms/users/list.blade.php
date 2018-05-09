@extends('layouts.app')

@section('title', 'Список пользователей')

@section('content')
    @forelse ($users as $user)
        @include('listing.card', [
            'title' => $user->name,
            'url' => route('users.view', [$user->id]),
            'description' => $user->email,
            'description_small' => $user->email,
            'image' => $user->avatar,
            'button' => [
                ['title' => $user->chat_messages_count . ' сообщени' . Lang::choice('е|я|й', $user->chat_messages_count)],
            ],
        ])
    @empty
        <div class="single-post mb-4 mr-3">
            <p>Список пользователей пуст</p>
        </div>
    @endforelse
@endsection