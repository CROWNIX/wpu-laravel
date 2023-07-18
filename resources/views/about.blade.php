@extends("layouts.main")

@section("container")
<div class="row">
    <div class="col text-center">
        <img src="img/{{ $image }}" alt="{{ $name }}" class="rounded-circle img-thumbnail" />
        <h1 class="display-4">{{ $name }}</h1>
        <p>Student | Web Developer</p>
    </div>
</div>
@endsection