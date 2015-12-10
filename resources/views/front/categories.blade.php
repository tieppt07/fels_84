@extends('master')

@section('title', 'Categories')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($categories->count() > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Words Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->words->count() }}</td>
                                                <td>
                                                    {!! Form::open(['method' => 'POST', 'url' => 'lessons']) !!}
                                                        {!! Form::hidden('category_id', $category->id) !!}
                                                        {!! Form::submit('Start Lesson', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $categories->render() !!}
                                </div>
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
