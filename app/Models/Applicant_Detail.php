<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Applicant_Detail extends Model
{
    use HasFactory;

    protected $table = "applicant_details";

    public function user(){
        return $this->hasOne(User::class);
    }
}
