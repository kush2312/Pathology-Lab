<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slots';

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
    protected $fillable = ['time', 'notes'];

    public static function getSlotsArray(){
        $slots = DB::select('SELECT * FROM slots');

        $slot_data = [];

        foreach ($slots as $slot) {
            $slot_data[$slot->id] = $slot->time;
        }

        return $slot_data;
    }
}
