@extends('layouts.app')
@section('content')

<div class="container">
    @include('components.title', ['title' =>  __('messages.register')])
    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" action="{{ route('account.register') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-3">
                        <label for="first_name" class="col-form-label">
                            {{ __('messages.first' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="middle_name" class="col-form-label">
                            {{ __('messages.middle' )}}
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="middle_name" name="middle_name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="last_name" class="col-form-label">
                            {{ __('messages.last' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="email" class="col-form-label">
                            {{ __('messages.email' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="gender" class="col-form-label">
                            {{ __('messages.gender' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <select class="form-control text-capitalize" id="gender" name="gender">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->gender_desc }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="role" class="col-form-label">
                            {{ __('messages.role' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <select class="form-control text-capitalize" id="role" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_desc }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="password" class="col-form-label">
                            {{ __('messages.password' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="display_picture_link" class="col-form-label">
                            {{ __('messages.display' )}}
                            <span style="color:red">*</span>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="file" class="form-control-file" id="display_picture_link" name="display_picture_link">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.save' )}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
