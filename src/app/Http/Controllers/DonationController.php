<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public static function showInsert() {
        return view('private.donation.donationForm');
    }

    public static function Consult() {
        $donacion = Donation::all();
        echo json_encode($donacion);
    }
    
    public static function insert($array) {
        $donation = new Donation();
        $donation->name = $array["name"];
        $donation->last_name = $array["last_name"];
        $donation->amount = $array["amount"];
        if ($array["size"]!="No quiere") {
            $donation->size = $array["size"];
        } else {
            unset($donation->size);
        }
        $saved = $donation->save();
        if (!$saved) {
            echo json_encode("KO");
        } else {
            echo json_encode("OK");
        }
        
    }

    public static function donation() {
        echo json_encode("donation");
    }
}
