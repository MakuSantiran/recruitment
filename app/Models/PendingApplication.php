<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingApplication extends Model
{
    use HasFactory;
    protected $table = "pending_applications";
}
