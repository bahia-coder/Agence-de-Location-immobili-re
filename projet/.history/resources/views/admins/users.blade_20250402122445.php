@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if (\Session::has('success'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('success') }}</p>
                            </div>
                    </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Users</h5>
                    <a href="{{ route('admins.create') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        User</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User name</th>
                                <th scope="col">email</th>
                            </tr>
                        </thead>
                        <tbody>
                           

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
