@extends('master')
@section('title', 'Words List')
@section('content')
    <div class="row">   
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Words List</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            {!! Form::open(['id' => 'form-filter']) !!}
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="category" class="control-label">Category</label>
                                            {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Category</label><br>
                                            <div class="radio-inline">
                                                <label>
                                                    {!! Form::radio('filter', 'all', true) !!}All words
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label>
                                                    {!! Form::radio('filter', 'learned') !!}Learned words
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label>
                                                    {!! Form::radio('filter', 'unlearned') !!}Unlearned words
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::submit('Filter', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1"> 
                                <div id="returnData"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
