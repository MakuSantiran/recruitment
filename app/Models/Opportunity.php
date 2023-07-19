<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Opportunity extends Model
{
    use HasFactory;

    protected $table = 'opportunities';

    public function admin(){
        return $this->hasOne(Admin::class);
    }
}
