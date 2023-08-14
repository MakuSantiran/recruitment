<?php

namespace App\Http\Controllers;

use App\Models\EmpStatus;

class EmpStatusController extends Controller
{
    public function getEmpStatus()
    {
        return EmpStatus::get(['id', 'status']);
    }
}
