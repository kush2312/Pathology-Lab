<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['patient_id', 'test_id', 'date', 'slot_id', 'status'];

    public function patient(){
        return $this->belongsTo('App\Models\User');
    }

    public function test(){
        return $this->belongsTo('App\Models\Test');
    }

    public function slot(){
        return $this->hasOne('App\Models\Slot');
    }
}
