<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parent
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property ServiceCategory $serviceCategory
 * @property SSCategory[] $sSCategories
 */
class ServiceCategory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'service_category';

    /**
     * @var array
     */
    protected $fillable = ['parent', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serviceCategory()
    {
        return $this->belongsTo('App\ServiceCategory', 'parent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sSCategories()
    {
        return $this->hasMany('App\SSCategory', 'category_id');
    }
}
