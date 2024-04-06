<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resarvation;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get("reservation");
        return view('Reservations.index', compact("reservation"));
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get("reservation");
        $tables = Table::where('status', 'available')->get();
        return view("Reservations.step-two", compact("tables", 'reservation'));
    }

    public function stepOneStore(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|string",
            "phone" => "required|numeric",
            "res_date" => "required|date|after:today",
            "guest_number" => "required|numeric",
        ]);
        if (empty($request->session()->get("reservation"))) {
            $reservation = new Resarvation();
            $reservation->fill($data);
            $request->session()->put("reservation", $reservation);
        } else {
            $reservation = $request->session()->get("reservation");
            $reservation->fill($data);
            $request->session()->put("reservation", $reservation);
        }
        // dd($data);
        return to_route("reservation.two");
    }

    public function stepTwoStore(Request $request)
    {
        $dataValidate = $request->validate([
            "table_id" => "required"
        ]);
        $reservation = $request->session()->get("reservation");
        $table = Table::findOrFail($request->table_id);
        if ($table->guest_number < $reservation->guest_number) {
            return back()->with("warning", "choose table has the same or less then number of guest");
        }
        $request_date = Carbon::parse($reservation->res_date);
        $rest = $request_date->format('Y-m-d');
        foreach ($table->reservations as $res) {
            $resDate = Carbon::parse($res->res_date);
            if ($resDate->format('Y-m-d') === $request_date->format('Y-m-d')) {
                return back()->with("warning", "this table is reserve in this day");
            }
        }
        $reservation->fill($dataValidate);
        $reservation->save();
        $request->session()->forget("reservation");

        return to_route('home');
    }
}
