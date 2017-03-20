<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    //

    public function articles() {
        return $this->hasMany('App\Article');
    }

}
