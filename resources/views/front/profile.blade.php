@extends('master')
@section('title', 'Profile')

@section('content')
    <div class="row">   
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <div class="row" id="profile">
                        <div class="col-md-3">
                            <div class="text-center">
                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-thumbnail">
                                @if ($currentUser->is($user->id))    
                                    @can('update-avatar', $user)                 
                                        {!! Form::open(['method' => 'PATCH', 'url' => 'avatars/' . $user->id, 'files' => true]) !!}
                                            {!! Form::file('avatar', ['required' => 'required']) !!}
                                            {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                @endif
                                @if (!$currentUser->is($user->id))
                                    @if ($checkFollow)
                                        {!! Form::open(['id' => 'form', 'class' => 'unfollow_form']) !!}
                                            {!! Form::hidden('followeeId', $user->id, ['id' => 'followeeId']) !!}
                                            <button type="submit" class="button followButton following">Following</button>
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['id' => 'form', 'class' => 'follow_form']) !!}
                                            {!! Form::hidden('followeeId', $user->id, ['id' => 'followeeId']) !!}
                                            <button type="submit" class="button followButton">Follow</button>
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p>Name: {{ $user->name }}</p>
                            <p>Email: {{ $user->email }}</p>
                            <p>Role: {{ $user->getRoleName() }}</p>
                            <p><span id="returnData">{{ $user->followers()->count() }}</span> followers | {{ $user->followees()->count() }} follows</p>
                            @if ($currentUser->is($user->id))
                                @include('front.partial.showing_error')
                                @can('update-name', $user)
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createModal">Edit name</button>
                                    @include('front.partial.edit_user')
                                @endcan
                                @can('update-password', $user)
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#changePasswordModal">Change Password</button>
                                    @include('front.partial.change_password')
                                @endcan
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($activities->count() > 0)
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
                                    @else
                                        No results!
                                    @endif
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
