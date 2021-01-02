<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Sample extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'samples';

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
    protected $fillable = ['sample_type', 'patient_id', 'collect_date', 'appointment_id', 'test_id'];

    public function patient(){
        return $this->belongsTo('App\Models\User');
    }

    public function appointment(){
        return $this->belongsTo('App\Models\Appointment');
    }

    public function test(){
        return $this->belongsTo('App\Models\Test');
    }

    public static function getPossibleEnumValues($name){

        $instance = new static; // create an instance of the model to be able to get the table name
        $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "'.$name.'"') )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = [];
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            array_push($enum, $v);
        }
        return array_combine($enum, $enum);
    }
}
