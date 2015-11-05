@extends('admin.admin')

@section('title', 'Create new User Account')
@section('page-header', 'Add New User Accounts')
@section('content')   
    <div class="row-fluid">
        <div class="well">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home">
                    {!! Form::open(['url' => 'admin/users']) !!}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="btn-toolbar">
                                <a href="{{ URL::previous() }}" class="btn btn-default">
                                    <i class="icon-white icon-chevron-left"></i>Back
                                </a>
                                {!! Form::submit('Create', ['class' => 'btn btn-primary'] ) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-6">
                                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class'=>'form-control'] ) !!} 
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                {!! Form::label('role', 'Role:', ['class' => 'control-label']) !!}
                                {!! Form::select('role', config('constant.role'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> <!-- /end row-fluid -->
@endsection

