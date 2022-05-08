<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    public $timestamps = false;

    public function equipments() {
        return $this->hasMany('App\Equipment', 'equipment_types_id');
    }
}
