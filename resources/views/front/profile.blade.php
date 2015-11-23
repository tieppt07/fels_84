@extends('master')
@section('title', 'Profile')

@section('content')
    <div class="row">   
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="profile">
                                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-thumbnail">
                                    @if ($currentUser->is($user->id))    
                                        @can('update-avatar', $user))                  
                                            {!! Form::open(['method' => 'PATCH', 'url' => 'avatars/' . $user->id, 'files' => true]) !!}
                                                {!! Form::file('avatar', ['required' => 'required']) !!}
                                                {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p>Name: {{ $user->name }}</p>
                            <p>Email: {{ $user->email }}</p>
                            <p>Role: {{ $user->getRoleName() }}</p>
                            @if ($currentUser->is($user->id))
                                @include('front.partial.showing_error')
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createModal">Edit</button>
                                @include('front.partial.edit_user')
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach ($activities as $activity)
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <p>
                                                    Started Lesson <strong>#{{ $activity->id }}</strong>
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
            </div>
        </div>
    </div>
@endsection
