<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $pathology_id
 * @property string $first_name
 * @property string $name
 * @property string $birthday
 * @property User $user
 * @property Pathology $pathology
 * @property Appointement[] $appointements
 */
class PersonInNeed extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personinneed';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'pathology_id', 'first_name', 'name', 'birthday'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pathology()
    {
        return $this->belongsTo('App\Pathology');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointements()
    {
        return $this->hasMany('App\Appointement');
    }
}
