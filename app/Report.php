<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $issue_date
 * @property string $content
 * @property User $user
 * @property Answer[] $answers
 */
class Report extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'issue_date', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers() {
        return $this->hasMany('App\Answer');
    }


    public function getScore() {
        return $this->answers()->get()->sum('answer');
    }

    public function getRating() {
        $score = $this->getScore();
        if ($score > 5.5)
            return "Fardeau sévère";
        else if ($score > 3.5)
            return "Fardeau modéré à sévère";
        else if ($score > 1.5)
            return "Fardeau léger à modéré";
        else
            return "Fardeau absent ou léger";
    }
}
