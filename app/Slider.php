<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Slider
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $img
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Slider whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Slider whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Slider whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Slider whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Slider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Slider extends Model
{
    //
}
