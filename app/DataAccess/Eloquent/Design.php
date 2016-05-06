<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    /** @var string */
    protected $table = 'designs';

    /** @var array */
    protected $fillable = ['css', 'user_id'];
}
