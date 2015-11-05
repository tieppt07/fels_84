@extends('admin.admin')

@section('title', 'List Of Categories')
@section('page-header', 'List Of Categories')
@section('content')
    <div class="row-fluid">
        <div class="btn-toolbar">
            <a class="btn btn-primary" href="{{ url('admin/categories/create') }}">
                <i class="icon-plus"></i>Add new
            </a>
            <div class="btn-group"></div>
        </div>
        <div class="well">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Words Count</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->words()->count() }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a href="{{ url('admin/categories/'.$category->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                {!! Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $categories->render() !!}
            </div>
        </div>
    </div> <!-- /end row-fluid -->
@endsection
