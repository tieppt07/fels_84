@extends('admin.admin')

@section('title', 'Create new Word')
@section('page-header', 'Add New Word')
@section('content')   
    <div class="row-fluid">
        <div class="well">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home">
                    {!! Form::open(['method' => 'PATCH', 'url' => 'admin/words/'.$word->id]) !!}
                        @include('admin.partial.showing_error')
                        <div class="form-group">
                            <div class="btn-toolbar">
                                <a href="{{ URL::previous() }}" class="btn btn-default">
                                    <i class="icon-white icon-chevron-left"></i>Back
                                </a>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12">
                                {!! Form::label('name', 'Word:', ['class' => 'control-label']) !!}
                                {!! Form::text('name', $word->name, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-xs-12 col-sm-12">
                                {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}
                                {!! Form::select('category', $categories, $word->category->id, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-xs-12 col-sm-12">
                                {!! Form::label('description', 'Word Description:', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', $word->description, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> <!-- /end row-fluid -->
@endsection

