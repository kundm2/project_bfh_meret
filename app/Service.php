<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $website
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Service extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Service';

    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
   public $incrementing = true;

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'website', 'description', 'created_at', 'updated_at'];

    public function getCategories() {
        $sscs = SSCategory::where('service_id', '=', $this->id)->get();
        $categories = [];
        foreach ($sscs as $ssc) {
            $cat = ServiceCategory::find($ssc->category_id);
            $categories[] = $cat->toArray();
        }
        return $categories;
    }

    public function hasCategory($catID) {
        if (SSCategory::where('service_id', $this->id)->where('category_id', $catID)->count() > 0)
            return true;
        else
            return false;
    }
}
