<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeData($query, $key = NULL, $orderBy = NULL, $direction = 'asc', $offset = 0, $limit = 0)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $query->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'email',
            'created_at',
            'updated_at'
        ]);
        if (is_array($key)) {
            $query->where($key);
        }

        if (!empty($offset) || !empty($limit)) {
            $query->take($limit)->skip($offset);
        }

        if (!empty($orderBy)) {
            $query->orderBy($orderBy, $direction);
        }

        return $query;
    }
}
