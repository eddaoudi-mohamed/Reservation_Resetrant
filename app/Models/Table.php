<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ["name", "guest_number", "status", "location"];


    public function reservations()
    {
        return $this->hasMany(Resarvation::class);
    }
}
