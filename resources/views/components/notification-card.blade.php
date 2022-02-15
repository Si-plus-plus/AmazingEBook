@if ($errors->any())
    <div class="container mt-4 alert alert-danger">
        @foreach ($errors->all() as $message)
            {{ $message }}
            <br>
        @endforeach
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="container mt-4 alert alert-success">
        {{ $message }}
    </div>
@endif
