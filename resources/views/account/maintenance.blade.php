@extends('layouts.app')
@section('content')

<div class="container container-fluid">
    @include('components.title', ['title' => __('messages.maintenance')])

    <table class="table">
        <thead>
            <tr class="d-flex">
                <th class="text-center">
                        #
                </th>
                <th class="col-2 text-center">
                        {{ __('messages.first' )}}
                </th>
                <th class="col-2 text-center">
                        {{ __('messages.middle' )}}
                </th>
                <th class="col-2 text-center">
                        {{ __('messages.last' )}}
                </th>
                <th class="col-4 text-center">
                        {{ __('messages.role' )}}
                </th>
                <th class="col-2 text-center">

                </th>
            </tr>
        </thead>
        <tbody>
            @php ($ctr=1)
            @foreach ($accounts as $account)
                <tr class="d-flex">
                    <td>
                        {{ $ctr }}
                    </td>
                    <td class="col-2 text-center">
                            {{ $account->first_name }}
                    </td>
                    <td class="col-2 text-center">
                            {{ $account->middle_name }}
                    </td>
                    <td class="col-2 text-center">
                            {{ $account->last_name }}
                    </td>
                    <td class="col-6">
                        <div class="row d-flex">
                            <form class="col-9" enctype="multipart/form-data" action="{{ route('account.maintenance', ['account_id' => $account->id]) }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <select class="form-control text-capitalize col-8" name="role" @if ($account->id === Auth::user()->id) disabled @endif>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($account->role_id === $role->id) selected @endif>
                                            {{ $role->role_desc }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="mx-4 btn btn-primary" @if ($account->id === Auth::user()->id) disabled @endif>
                                        Save
                                    </button>
                                </div>
                            </form>
                            <form class="col-3" enctype="multipart/form-data" action="{{ route('account.destroy', ['account_id' => $account->id]) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="mx-4 btn btn-danger"  @if ($account->id === Auth::user()->id) disabled @endif>
                                    {{ __('messages.delete' )}}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php ($ctr+=1)
                @endforeach
            </tbody>
    </table>
</div>
@endsection
