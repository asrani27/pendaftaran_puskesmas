<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_puskesmas extends Model
{
    use HasFactory;
    protected $table = 'm_puskesmas';
    protected $guarded = ['id'];

    public $timestamps = false;
}
