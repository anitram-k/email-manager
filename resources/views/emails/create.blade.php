@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Email</h1>
        <form action="{{ route('emails.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection