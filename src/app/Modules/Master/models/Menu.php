<?php
namespace App\Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table      = 'dcms_menu';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'url',
        'icon',
        'order',
        'additional_data',
        'is_deleted',
        'deleted_by',
        'deleted_date',
        'update_by'
    ];
}