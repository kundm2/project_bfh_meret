<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $postcode
 * @property string $city
 * @property string $abbr
 * @property string $created_at
 * @property string $updated_at
 */
class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'city';

    /**
     * @var array
     */
    protected $fillable = ['postcode', 'city', 'abbr', 'created_at', 'updated_at'];

}
