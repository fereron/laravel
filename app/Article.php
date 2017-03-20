<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $description
 * @property string $alias
 * @property string $img
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $user_id
 * @property int $category_id
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUserId($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    //

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

}
