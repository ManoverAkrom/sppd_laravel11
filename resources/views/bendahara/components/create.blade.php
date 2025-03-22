@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ route('finance.components.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Component Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Component</button>
        </form>
    </div>
@endsection
