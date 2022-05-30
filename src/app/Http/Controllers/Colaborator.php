<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Colaborator extends BaseController
{
    public static function prueba () {
        echo json_encode("hola");
    }

    public static function showInsert() {
        echo json_encode("showInsert");
    }

    public static function insert() {
        echo json_encode("insert");
    }
    
    public static function datatable() {
        echo json_encode("datatable");
    }

    public static function ShowEdit() {
        echo json_encode("ShowEdit");
    }

    public static function edit() {
        echo json_encode("edit");
    }

    public static function removeAction() {
        echo json_encode("removeAction");
    }

    public static function acceptRemove() {
        echo json_encode("acceptRemove");
    }
}

