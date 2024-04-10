<?php

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Collection;
function getInformationDataTable($pagination)
{
    return trans('project.data_table.information',[
        'first_item'=>$pagination->firstItem(),
        'last_item'=>$pagination->lastItem(),
        'total'=>$pagination->total()
    ]);

}

function getArray($modal){
    if($modal instanceof Collection){
        $arrays = [];
        $modal->each(function ($item) use (&$arrays){
            $arrays[] = $item->id;
        });
        return $arrays;
    }
    return null;
}



