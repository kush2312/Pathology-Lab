<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    
    protected $table = 'fields';

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
    protected $fillable = ['name', 'unit', 'normal', 'test_id', 'abnormal', 'ref_range'];

    public function test(){
        return $this->belongsTo('App\Models\Test');
    }

}
