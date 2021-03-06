<?php
namespace Hedonist\Entities\Place;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PlaceCategory
 *
 * @property int $id
 * @property string $name
 */
class PlaceCategory extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $table = 'place_categories';

    protected $fillable = ['name','logo'];

    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'place_category_place_tag',
            'place_category_id',
            'place_tag_id'
        );
    }
}
