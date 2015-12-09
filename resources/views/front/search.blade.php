@extends('master')

@section('title', 'Search')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Results Search</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($users->count() > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ $user->avatar }}" alt="{{ $user->name }}" width="50px" height="50px"></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><a href="{{ url('users/' . $user->id) }}" class="btn btn-success">Profile</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No results!
                            @endif
                        </div>
                    </div>
                </div> {{-- /end panel-body --}}
            </div>
        </div>
    </div>
@endsection
