<?php

namespace App\Http\Controllers;

use App\EquipmentType;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    public function categorizeEquipment($type) {
        $equipmentType = EquipmentType::find($type);

        return view('equipment.equipmentlist', compact('equipmentType'));
    }
}
