<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LLO;

class EMSController extends Controller
{
    public function insertLLO(Request $req)
    {

        $date=$req->date;
        $name=$req->name;
        $A=$req->A;
        $A_lower=$req->A_lower;
        $A_upper=$req->A_upper;
        $B=$req->B;
        $B_lower=$req->B_lower;
        $B_upper=$req->B_upper;
        $C=$req->C;
        $C_lower=$req->C_lower;
        $C_upper=$req->C_upper;
        $D=$req->D;
        $D_spec=$req->D_spec;
        $model=new LLO;
        $model->date=$date;
        $model->name=$name;
        $model->max_lum=$A;
        $model->max_lum_spec_lower=$A_lower;
        $model->max_lum_spec_upper=$A_upper;
        $model->percent_area_monitor_lum=$B;
        $model->percent_area_monitor_lum_lower=$B_lower;
        $model->percent_area_monitor_lum_upper=$B_upper;
        $model->percent_area_beam_size_lum=$C;
        $model->percent_area_beam_size_lum_lower=$C_lower;
        $model->percent_area_beam_size_lum_upper=$C_upper;
        $model->fullpower_W=$D;
        $model->fullpower_W_spec=$D_spec;
        $model->save();
        return $model->all();
    }
}
