@extends('master')

@section('title', 'Categories')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Category: {{ $category->name }} - {{ $category->words->count() }} words</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($category->words->count() > 0)
                                {!! Form::open(['method' => 'POST', 'url' => 'lessons']) !!}
                                    {!! Form::hidden('category_id', $category->id) !!}
                                    {!! Form::submit('Start Lesson', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Word</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category->words as $word)
                                            <tr>
                                                <td>{{ $word->name }}</td>
                                                <td>{{ $word->description }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else 
                                No words!
                            @endif
                        </div>
                    </div>
                </div> {{-- /end panel-body --}}
            </div>
        </div>
    </div>
@endsection
