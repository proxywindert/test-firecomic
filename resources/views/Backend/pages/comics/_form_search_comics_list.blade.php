<div id="modal-search" class="collapse">
    <div class="modal-dialog">
    {!! Form::open(
    ['url' =>route('comics.list'),
    'method'=>'GET',
    'id'=>'form_search_process'
    ]) !!}
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{  trans('common.title_form.form_search') }}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input id="number_record_per_page" type="hidden" name="number_record_per_page"
                               value="{{ isset($param['number_record_per_page'])?$param['number_record_per_page']:config('settings.paginate') }}"/>
                        <div class="input-group margin">
                            <div class="input-group-btn">
                                <button type="button" class="btn width-100">{{ trans('project.id')  }}</button>
                            </div>
                            {{ Form::text('project_id', old('project_id'),
                                ['class' => 'form-control',
                                'id' => 'project_id',
                                'autofocus' => false,
                                ])
                            }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer center">
                <button id="btn_reset" type="button" class="btn btn-default"><span class="fa fa-refresh"></span> {{ trans('common.button.reset')}}
                </button>
                <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span> {{ trans('common.button.search')  }}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btn_reset").bind("click", function () {
            $("#role").val('').change();
            $("#project_status").val('').change();
            $("#start_date").val('value', '');
            $("#end_date").val('value', '');
            $("#project_name").val('');
        });
    });

    $(document).ready(function () {
        var old = '{{ isset($param['number_record_per_page'])?$param['number_record_per_page']:'' }}';
        var options = $("#select_length option");
        var select = $('#select_length');

        for(var i = 0 ; i< options.length ; i++){
            if(options[i].value=== old){
                select.val(old).change();
            }
        }
    });
</script>
