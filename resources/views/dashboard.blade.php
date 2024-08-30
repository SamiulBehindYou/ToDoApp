@extends('layout')

@section('main')

  {{-- Create ToDo ID --}}
  <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head rounded bg-primary">
                <h1 class="text-white text-center">Create ToDo ID</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('create_id') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">NID/Student ID</label>
                        <input type="number" name="id" class="form-control"
                            placeholder="Enter your NID/Student ID">
                    </div>
                    <div class="mb-2">
                        <input type="submit" value="Create ID" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- View ToDo --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head rounded bg-primary">
                <h1 class="text-white text-center">View ToDo</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('view_todo') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Select View</label>
                        <select name="option" class="form-control">
                            <option value="1">All</option>
                            <option value="2">Done ToDo</option>
                            <option value="3">Not Done ToDo</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">NID/Student ID</label>
                        <input type="number" name="id" class="form-control"
                            placeholder="Enter ID to view ToDos">
                        @error('id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="submit" value="View ToDo" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
