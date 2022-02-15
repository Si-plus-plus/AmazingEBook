@extends('layouts.app')

@section('content')

<div class="container">
    @auth
        @include('components.title', ['title' => 'Hi, ' . Auth::user()->first_name])
        <div class="row">
            @foreach ($ebooks as $ebook)
                @include('components.index-items', ['$ebook' => $ebook])
            @endforeach
        </div>
        <div class="d-flex justify-content-end pt-4">
            {{ $ebooks->links() }}
        </div>
    @else
        @include('components.title', ['title' => 'Hi, Guest'])
    @endauth
</div>


@endsection
