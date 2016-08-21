<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //use \App\DataAccess\Eloquent\SaveTransactionalTrait;

    /** @var string */
    protected $table = 'images';

    /** @var array */
    protected $fillable = ['user_id', 'name', 'filename'];
}
