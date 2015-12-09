@extends('admin.admin')

@section('title', 'List Of User Accounts')
@section('page-header', 'List Of User Accounts')
@section('content')
    <div class="row-fluid">
        <div class="btn-toolbar">
            <a class="btn btn-primary" href="{{ url('admin/users/create') }}">
                <i class="icon-plus"></i>Add new
            </a>
            <div class="btn-group"></div>
            {!! Form::open(['method' => 'GET' ,'class' => 'search form-inline search-employee']) !!}
                <div class="input-box">
                    {!! Form::label('keyword') !!}
                    {!! Form::text('keyword', null, ['placeholder' => 'Search profiles', 'class' => 'form-control']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="well">
            @if ($users->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="text-center"><img src="{{ $user->avatar }}" alt="" width="50px" height="50px"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ config('constant.role')[$user->is_admin] }}</td>
                                <td class="text-center">{{ $user->created_at }}</td>
                                <td class="text-center">{{ $user->updated_at }}</td>
                                <td class="text-center">
                                    {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $users->render() !!}
                </div>
            @else 
                No results!
            @endif
        </div>
    </div> <!-- /end row-fluid -->
@endsection
