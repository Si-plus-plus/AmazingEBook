@extends('layouts.app')

@section('content')

<div class="container ">
    @include('components.title', ['title' => __('messages.login')])

    <div class="justify-content-center row">
        <form method="post" class="col-8" action="{{ route('account.login') }}">
            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-2">
                    <label for="txtEmail" class="col-form-label">
                        {{ __('messages.email' )}}
                    </label>
                </div>
                <div class="col-10">
                    <input type="email" class="form-control" id="txtEmail" name="email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <label for="txtPassword" class="col-form-label">
                        {{ __('messages.password' )}}
                    </label>
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" id="txtPassword" name="password">
                </div>
            </div>
            <div class="row my-4">
                <button type="submit" class="btn btn-primary w-25 mx-auto">
                    {{ __('messages.login' )}}
                </button>
            </div>
        </form>
    </div>
    <div class="justify-content-center row">
        {{ __('messages.noacc' )}}
        <a href="{{ route('account.register') }}"> {{ __('messages.clickhere' )}} </a>
    </div>
</div>


@endsection
