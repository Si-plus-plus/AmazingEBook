@extends('layouts.app')
@section('content')

<div class="container">
    @include('components.title', ['title' => __('messages.cart' ) ])

    @if (sizeof($cart_items) > 0)
        <div class="row">
            @foreach ($cart_items as $cart_item)
                @include('components.cart-items', ['cart_item' => $cart_item])
            @endforeach
        </div>
        <div class="d-flex justify-content-end pt-4">
            <form action="{{ route('order.checkout') }}" method="post">
                {{ csrf_field() }}
                <button class="btn btn-bg btn-primary" type="submit">
                    {{ __('messages.checkout' )}}
                </button>
            </form>
        </div>
    @else
        <h4 class="text-center">
            {{ __('messages.emptycart' )}}
        </h4>
    @endif
</div>

@endsection
