<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 * @property int $id
 * @property string $role
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\user_role[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    //

    public function users() {
        return $this->belongsToMany('App\user_role');
    }

}
