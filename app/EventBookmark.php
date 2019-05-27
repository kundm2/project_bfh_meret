<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $event_id
 * @property string $note
 * @property User $user
 * @property Event $event
 */
class EventBookmark extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'eventbookmark';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'event_id', 'note'];

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
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
