<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSensor extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the AssignSensor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function station()
    {
        return $this->hasOne(Station::class, 'id', 'station_id');
    }

    public function sensor()
    {
        return $this->hasOne(Sensor::class, 'id', 'sensor_id');
    }
}
