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
                                                class="btn btn-outline-info btn-sm">Make done</a>
                                        @else
                                            <strong class="text-success px-4">Done</strong>
                                        @endif
                                        <a href="{{ route('send_to_trash', $todo->id) }}"
                                            class="btn btn-outline-danger btn-sm">Tras
                                            h</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- show trash --}}

    <div class="row my-3">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">Your Trash ({{ $name }})</h1>
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
                            @foreach ($trash as $sl => $t)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $t->nid }}</td>
                                    <td>{{ $t->title }}</td>
                                    <td>{{ $t->description }}</td>
                                    <td>
                                        <a href="{{ route('delete_todo', $t->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
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
