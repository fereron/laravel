<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $website
 * @property string $text
 * @property int $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $article_id
 * @property int $user_id
 * @property int $order
 * @property int $depth
 * @property-read \App\Article $article
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereWebsite($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    //


    protected $fillable = ['name', 'email', 'website', 'text', 'article_id', 'parent_id', 'user_id', 'article_id'];

    public function article() {
        return $this->belongsTo('App\Article');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
