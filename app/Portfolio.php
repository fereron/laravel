<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Portfolio
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $alias
 * @property string $customer
 * @property string $img
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $filter_alias
 * @property-read \App\Filter $filter
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCustomer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereFilterAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Portfolio extends Model
{
    //

    public function filter() {

        return $this->belongsTo('App\Filter', 'filter_alias', 'alias');
    }
}
