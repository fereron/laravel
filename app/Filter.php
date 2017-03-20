<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Filter
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Filter whereAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Filter whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Filter whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Filter whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Filter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Filter extends Model
{
    //
}
