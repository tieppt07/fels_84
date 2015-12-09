@extends('admin.admin')

@section('title', 'View Word and Answers')
@section('page-header', 'View Word and Answers')
@section('content')
    <div class="row-fluid">
        <div class="btn-toolbar">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                <i class="icon-plus"></i>More answer
            </button>
            @include('admin.partial.showing_error')
            @include('admin.word.partial.create_answer')
            <div class="btn-group"></div>
        </div>
        <div class="well">
            <table class="table table-hover">
                <caption>Word: <a href="{{ url('admin/words/'.$word->id.'/edit') }}" title="Edit">{{ $word->name }}</a></caption>
                <thead>
                    <th>Answers</th>
                    <th>Right/Wrong</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($word->answers as $answer)
                        <tr>
                            <td>{{ $answer->answer }}</td>
                            <td>
                                {!! $answer->is_correct ? '<p class="text-success">RIGHT</p>' : '<p class="text-warning">WRONG</p>' !!}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$answer->id}}">Edit</button>
                                @include('admin.word.partial.edit_answer')
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.answers.destroy', $answer->id], 'method' => 'delete']) !!}
                                    {!! Form::hidden('word_id', $word->id) !!}
                                    {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- /end row-fluid -->
@endsection
