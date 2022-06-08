<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index() {
        return view('private.donations.donation');
    }
    public static function showInsert() {
        return view('private.donations.donationForm');
    }

    public static function Consult() {
        $donacion = Donation::all();
        return $donacion;
    }

    public function store(Request $request) {

        $donation = new Donation();
        $request->validate([
            'name' => ['required','max:50'],
            'last_name' => ['required','max:100'],
            'amount' => ['required','max:999'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio'
        ]);
        $donation->name = $_REQUEST["name"];
        $donation->last_name = $_REQUEST["last_name"];
        $donation->amount = $_REQUEST["amount"];
        if ($_REQUEST["size"]!="No quiere") {
            $donation->size = $_REQUEST["size"];
        } else {
            unset($donation->size);
        }
        $saved = $donation->save();
        if (!$saved) {
            return redirect('/donation')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/donation');
        }

    }

    public static function donation() {
        echo json_encode("donation");
    }
}
