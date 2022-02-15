@extends('layouts.app')
@section('content')

<div class="container">
    @include('components.title', ['title' => __('messages.orderd')])

    <table class="mb-4">
        <tr>
            <td>
                {{ __('messages.orderid' )}}
            </td>
            <td>
                :
            </td>
            <td>
                {{ $invoice->id }}
            </td>
        </tr>
        <tr>
            <td>
                {{ __('messages.orderdate' )}}
            </td>
            <td>
                :
            </td>
            <td>
                {{ $invoice->order_date }}
            </td>
        </tr>
    </table>
    <div class="card">
        <ul class="list-group list-group-flush">
            @foreach ($invoice->items as $ebook)
                <li class="list-group-item"> {{ $ebook->e_book->title }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
