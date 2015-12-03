@extends('master')
@section('title', 'Lesson')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lesson: #{{ $lesson->id }} -  
                    Caterory: <a href="{{ url('category') }}">{{ $lesson->category->name }}</a> - 
                    Right: {{ $lesson->results()->Valid()->count() }}/{{ $lesson->results()->count() }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($results as $index => $result)
                            <div class="col-md-6">
                                <div class="list-group">
                                    <p class="list-group-item active">#{{ ++$index }}. {{ $result->word->name }}</p>
                                    @foreach ($result->word->answers as $answer)
                                        <p class="list-group-item">
                                            @if ($answer->id == $result->answer_id )
                                                {!! Form::radio("answer[$result->id]", $answer->id, true) !!}
                                            @else
                                                {!! Form::radio("answer[$result->id]", $answer->id) !!}
                                            @endif
                                            {{ $answer->answer }}
                                        </p>
                                    @endforeach
                                    {{ $result->isCorrect() }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> {{-- /end panel-body --}}
            </div>
        </div>
    </div>
@endsection

