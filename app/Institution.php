<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $company
 * @property string $first_name
 * @property string $name
 * @property string $address
 * @property int $postcode
 * @property string $city
 * @property string $country
 * @property Appointement[] $appointements
 * @property Event[] $events
 */
class Institution extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'institution';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['company', 'first_name', 'name', 'address', 'postcode', 'city', 'country'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointements()
    {
        return $this->hasMany('App\Appointement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
