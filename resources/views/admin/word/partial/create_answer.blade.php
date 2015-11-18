<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">One more answer</h4>
            </div>
            {!! Form::open(['url' => 'admin/answers']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-12">
                              {!! Form::hidden('word_id', $word->id) !!}
                              {!! Form::label('answer', 'Answer:', ['class' => 'control-lable']) !!}
                              {!! Form::text('answer', null, ['class' => 'form-control']) !!}
                              <div class="radio">
                                  <label>
                                      {!! Form::radio('is_correct', 1) !!}RIGHT
                                  </label>
                              </div>
                              <div class="radio">
                                  <label>
                                      {!! Form::radio('is_correct', 0) !!}WRONG
                                  </label>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
