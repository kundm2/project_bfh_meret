<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $service_id
 * @property int $category_id
 * @property string $created_at
 * @property string $updated_at
 * @property ServiceCategory $serviceCategory
 * @property Service $service
 */
class SSCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 's_s_category';

    /**
     * @var array
     */
    protected $fillable = ['service_id', 'category_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serviceCategory()
    {
        return $this->belongsTo('App\ServiceCategory', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
