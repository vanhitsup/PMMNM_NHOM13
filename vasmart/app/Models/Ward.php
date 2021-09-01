<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'name_xa', 'type', 'maqh'
    ];
    protected $primaryKey = 'xaid';
    protected $table = 'add_xaphuongthitran';
}
