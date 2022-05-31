<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
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
