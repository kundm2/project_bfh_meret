<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $lon
 * @property float $lat
 * @property string $company
 * @property string $first_name
 * @property string $name
 * @property string $address
 * @property int $postcode
 * @property string $city
 * @property string $website
 * @property string $phone
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
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
     * @var array
     */
    protected $fillable = ['lon', 'lat', 'company', 'first_name', 'name', 'address', 'postcode', 'city', 'website', 'phone', 'type', 'created_at', 'updated_at'];

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
