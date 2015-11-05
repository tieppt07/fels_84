@extends('admin.admin')

@section('title', 'Create new Category')
@section('page-header', 'Add New Category')
@section('content')   
    <div class="row-fluid">
        <div class="well">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home">
                    {!! Form::open(['url' => 'admin/categories']) !!}
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
                                {!! Form::label('name', 'Category name:', ['class' => 'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> <!-- /end row-fluid -->
@endsection

