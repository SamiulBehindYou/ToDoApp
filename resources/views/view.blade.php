@extends('layout')

@section('main')
    {{-- show todo's --}}
    <div class="row my-3">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">Your All ToDo's ({{ $name }})</h1>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">
                        <table class="table text-center">
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($todos as $sl => $todo)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $todo->nid }}</td>
                                    <td>{{ $todo->title }}</td>
                                    <td>{{ $todo->description }}</td>
                                    <td>
                                        @if ($todo->status == 0)
                                            <a href="{{ route('make_done', $todo->id) }}"
                                                class="btn btn-outline-info btn-sm">Maek done</a>
                                        @else
                                            <strong class="text-success px-4">Done</strong>
                                        @endif
                                        <a href="{{ route('delete_todo', $todo->id) }}"
                                            class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
