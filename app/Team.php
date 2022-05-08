<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    public function equipments() {
        return $this->belongsToMany("App\Equipment", "equipment_team", "teams_id", "equipments_id");
    }
}
