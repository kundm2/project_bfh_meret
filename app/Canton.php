<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $abbreviation
 */
class Canton extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'canton';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'abbreviation'];

}
