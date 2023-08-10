<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpStatus extends Model
{
    use HasFactory;

    protected $connection = 'pisDB'; //(Maku: idk what pisDB means)
    protected $table = "emp_status";
}
