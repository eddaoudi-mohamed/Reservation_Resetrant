<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view("Admin.Table.index", compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Table.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "guest_number" => "required|numeric|min:1",
            "status" => "required",
            "location" => "required",
        ]);
        Table::create($data);

        return to_route("admin.tables.index")->with("success", "Table Created Succesfuly");
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
        $table = Table::findOrFail($id);
        return view("Admin.Table.edite", compact("table"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $table = Table::findOrFail($id);
        $data = $request->validate([
            "name" => "required|string",
            "guest_number" => "required|numeric|min:1",
            "status" => "required",
            "location" => "required",
        ]);
        $table->update($data);
        return to_route("admin.tables.index")->with("success", "Table Updated  Succesfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        return to_route("admin.tables.index")->with("success", "Table Deleted  Succesfuly");
    }
}
