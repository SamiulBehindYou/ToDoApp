@extends('layout')

@section('main')

            {{-- Create todo --}}
<div class="row my-3">
<div class="col-lg-10 m-auto">
    <div class="card">
        <div class="card-head rounded bg-primary">
            <h1 class="text-white text-center">Create new ToDo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('create_todo') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label class="form-label">ID</label>
                    <input type="number" placeholder="Enter valid ID" class="form-control" name="nid" value="{{ session('nid') }}">
                    @error('nid')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter name">
                    @error('title')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Description</label>
                    <textarea rows="3" name="description" class="form-control"></textarea>
                    @error('description')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-2">
                    <input type="submit" value="Create ToDo" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection
