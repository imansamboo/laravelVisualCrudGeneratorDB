<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maradona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maradonas';

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
    protected $fillable = ['name','age','color'];

    
}
