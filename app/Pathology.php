<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Personinneed[] $personinneeds
 */
class Pathology extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pathology';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personinneeds()
    {
        return $this->hasMany('App\Personinneed');
    }
}
