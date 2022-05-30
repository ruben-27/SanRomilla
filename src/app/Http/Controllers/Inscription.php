<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Inscription extends BaseController
{
    public static function inscription_date() {
        echo json_encode("inscription_date");
    }

    public static function inscription_form() {
        echo json_encode("inscription_form");
    }

    public static function showInsert() {
        echo json_encode("showInsert");
    }

    public static function terms() {
        echo json_encode("terms");
    }

    public static function hideTerms() {
        echo json_encode("hideTerms");
    }

    public static function incription_datatable() {
        echo json_encode("incription_datatable");
    }

    public static function totalBought() {
        echo json_encode("totalBought");
    }

    public static function keepShopping() {
        echo json_encode("keepShopping");
    }

    public static function validateInsert() {
        echo json_encode("validateInsert");
    }
    
    public static function insert() {
        echo json_encode("insert");
    }

    public static function ShowEdit() {
        echo json_encode("ShowEdit");
    }

    public static function validateEdit() {
        echo json_encode("validateEdit");
    }

    public static function edit() {
        echo json_encode("edit");
    }
}

