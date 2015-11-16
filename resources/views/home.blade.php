@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="profile">
                                    <img src="{{ $currentUser->avatar }}" alt="" width="100px" height="100px"><br><br>
                                    <p>{{ $currentUser->followers()->count() }} followers | {{ $currentUser->followees()->count() }} follows</p>
                                    <p><a href="{{ url('users/'.$currentUser->id) }}">{{ $currentUser->name }}</a></p>
                                    <p>learned 120 words</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="text-center">
                                <a href="{{ url('words') }}" class="btn btn-primary btn-lg">Words</a>
                                <a href="{{ url('lessons') }}" class="btn btn-default btn-lg">Lesson</a>
                            </p>
                            <div class="well">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @foreach ($activities as $activity)
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <p>
                                                        <a href="{{ url('users/'.$activity->user->id) }}">{{ $activity->user->name }}</a>
                                                        starts Lesson <strong>#{{ $activity->id }}</strong>
                                                        in Category <a href="{{ url('categories/'.$activity->category->id) }}">{{ $activity->category->name }}</a>
                                                        at <u>{{ $activity->created_at }}</u>
                                                    </p>  
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="text-center">
                                        {!! $activities->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- /end panel-body --}}
            </div>
        </div>
    </div>
@endsection
