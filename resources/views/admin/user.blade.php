@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <users>
                    </users>

                    {{-- <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#{{ $i }}" class="btn btn-danger btn-sm">
                                            <i data-feather="x"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal" tabindex="-1" role="dialog" id="{{ $i }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete "{{ $data->name }}"..??</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Modal body text goes here.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('user.delete') }}/{{ $data->id }}" method="delete">
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
