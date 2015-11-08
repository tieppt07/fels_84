@extends('admin.admin')

@section('title', 'List Of Words')
@section('page-header', 'List Of Words')
@section('content')
    <div class="row-fluid">
        <div class="btn-toolbar">
            <a class="btn btn-primary" href="{{ url('admin/words/create') }}">
                <i class="icon-plus"></i>Add new
            </a>
            <div class="btn-group"></div>
        </div>
        <div class="well">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Word</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($words as $word)
                        <tr>
                            <td>{{ $word->id }}</td>
                            <td>{{ $word->name }}</td>
                            <td>{{ $word->category->name }}</td>
                            <td>{{ $word->created_at }}</td>
                            <td>{{ $word->updated_at }}</td>
                            <td>
                                <a href="{{ url('admin/words/'.$word->id) }}" class="btn btn-default">View</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/words/'.$word->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.words.destroy', $word->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $words->render() !!}
            </div>
        </div>
    </div> <!-- /end row-fluid -->
@endsection
