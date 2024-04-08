<?php

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;

function getInformationDataTable($pagination)
{
    return trans('project.data_table.information',[
        'first_item'=>$pagination->firstItem(),
        'last_item'=>$pagination->lastItem(),
        'total'=>$pagination->total()
    ]);

}

