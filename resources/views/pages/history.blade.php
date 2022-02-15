@extends('layouts.app')
@section('content')

<div class="container">
    @include('components.title', ['title' =>  __('messages.history')])
    @if (count ($orders) > 0)
        <div class="row">
            @foreach ($orders as $order)
                @include('components.history-items', ['order' => $order])
            @endforeach
        </div>
    @else
        <h4>{{ __('messages.history' )}} is empty</h4>
    @endif
</div>

@endsection
