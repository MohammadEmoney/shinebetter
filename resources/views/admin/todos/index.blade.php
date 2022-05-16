@extends('layouts.admin')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <p class="card-description">
            Add class <code>.table-striped</code>
            </p>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>todo</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td class="py-1">{{ $todo->id }}</td>
                        <td>{{ $todo->name }}</td>
                        <td>{{ $todo->description }}</td>
                        <td><button type="button" class="btn btn-{{ $todo->done ? "primary" : "danger"}} btn-sm">{{ $todo->done ? "Active" : "Not Active" }}</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

@endsection
