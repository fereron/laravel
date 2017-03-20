<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Menu
 *
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $depth
 * @property int $lft
 * @property int $rgt
 * @property int $order
 * @property string $path
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    //
}
