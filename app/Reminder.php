<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $time_to_remind
 * @property string $note
 */
class Reminder extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reminder';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['time_to_remind', 'note'];

}
