<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resarvation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResarvationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Resarvation::all();
        return view("Admin.Resarvation.index", compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where("status", "available")->get();
        return view("Admin.Resarvation.create", compact("tables"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($table->guest_number < $request->guest_number) {
            return back()->with("warning", "choose table has the same or less then number of guest");
        }
        $request_date = Carbon::parse($request->res_date);
        $rest = $request_date->format('Y-m-d');
        foreach ($table->reservations as $res) {
            $resDate = Carbon::parse($res->res_date);
            if ($resDate->format('Y-m-d') === $request_date->format('Y-m-d')) {
                return back()->with("warning", "this table is reserve in this day");
            }
        }
        $data = $request->validate([
            "name" => "required",
            "email" => "required|string",
            "phone" => "required|numeric",
            "res_date" => "required|date|after:today",
            "guest_number" => "required|numeric",
            "table_id" => "required"
        ]);
        $data['res_date'] = Carbon::parse($request->res_date);
        Resarvation::create($data);
        return to_route("admin.resarvations.index")->with("success", "Reservation created successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation  = Resarvation::findOrFail($id);
        $tables = Table::all();
        return view("Admin.Resarvation.edite", compact("reservation", "tables"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Resarvation::findOrFail($id);
        $data = $request->validate([
            "name" => "required",
            "email" => "required|string",
            "phone" => "required|numeric",
            "res_date" => "required|date|after:today",
            "guest_number" => "required|numeric",
            "table_id" => "required"
        ]);
        $reservation->update($data);
        return to_route("admin.resarvations.index")->with("success", "Reservation Update successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Resarvation::findOrFail($id);
        $reservation->delete();
        return to_route("admin.resarvations.index")->with("success", "Reservation Deleted successfuly");
    }
}
