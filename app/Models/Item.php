<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $table = "items";
    protected $fillable = ['name', 'date_created', 'time_created'];
    public $timestamps = false;
}
