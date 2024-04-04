<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resarvation extends Model
{
    use HasFactory;

    protected $fillable = ["name", "email", "phone", "guest_number", "table_id", 'res_date'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
