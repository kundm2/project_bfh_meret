<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $company
 * @property string $first_name
 * @property string $name
 * @property string $address
 * @property int $postcode
 * @property string $city
 * @property string $canton
 * @property User $user
 */
class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'company', 'first_name', 'name', 'address', 'postcode', 'city', 'canton'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
