@extends('layouts.app')
@section('content')

<div class="container">
    @include('components.title', ['title' => __('messages.detail' )])

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
                {{ $ebook->title }}
            </h3>
            <h5 class="card-subtitle">
                {{ $ebook->author }}
            </h5>
            <p class="card-text">
                {{ $ebook->description }}
            </p>
        </div>
    </div>
    <form method="post" action="{{ route('order.add') }}" class="d-flex justify-content-end">
        {{ csrf_field() }}
        <input type="hidden" name="e_book_id" value="{{ $ebook->id }}">
        <button type="submit" class="btn btn-primary mt-2">
            {{ __('messages.addtocart' )}}
        </button>
    </form>
</div>

@endsection
