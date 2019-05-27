<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $institution_id
 * @property string $title
 * @property string $content
 * @property string $start_date
 * @property string $end_date
 * @property string $location
 * @property Institution $institution
 * @property Eventbookmark[] $eventbookmarks
 */
class Event extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'event';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['institution_id', 'title', 'content', 'start_date', 'end_date', 'location'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventbookmarks()
    {
        return $this->hasMany('App\Eventbookmark');
    }
}
