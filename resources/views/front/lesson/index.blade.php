@extends('master')
@section('title', 'Lesson')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lesson</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table-hover table">
                                <thead>
                                    <tr>
                                        <th>Lesson</th>
                                        <th>Category</th>
                                        <th>Right Questions</th>
                                        <th>Started at</th>
                                        <th>Check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        <tr>
                                            <td><a href="{{ url('lessons/' . $lesson->id . '/edit') }}">#{{ $lesson->id }}</a></td>
                                            <td>{{ $lesson->category->name }}</td>
                                            <td>{{ $lesson->results()->Valid()->count() }}/{{ $lesson->results()->count() }}</td>
                                            <td>{{ $lesson->created_at }}</td>
                                            <td><a href="{{ url('lessons/' . $lesson->id) }}" class="btn btn-danger">View</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $lessons->render() !!}
                            </div>
                        </div>
                    </div>
                </div> {{-- /end panel-body --}}
            </div>
        </div>
    </div>
@endsection

