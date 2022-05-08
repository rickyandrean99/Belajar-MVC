<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public $timestamps = false;
    protected $table = 'equipments';

    public function equipmentType() {
        return $this->belongsTo('App\EquipmentType', 'equipment_types_id');
    }
}
