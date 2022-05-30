<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Donation extends BaseController
{

    public static function showInsert() {
        echo json_encode("showInsert");
    }

    public static function Consult() {
        echo json_encode("Consult");
    }
    
    public static function insert() {
        echo json_encode("insert");
    }

    public static function donation() {
        echo json_encode("donation");
    }
}

