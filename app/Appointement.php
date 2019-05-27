<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $institution_id
 * @property int $personinneed_id
 * @property string $start_date
 * @property string $end_date
 * @property string $note
 * @property Institution $institution
 * @property Personinneed $personinneed
 */
class Appointement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'appointement';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['institution_id', 'personinneed_id', 'start_date', 'end_date', 'note'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personinneed()
    {
        return $this->belongsTo('App\Personinneed');
    }
}
