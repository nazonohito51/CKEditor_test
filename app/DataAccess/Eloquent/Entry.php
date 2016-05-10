<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //use \App\DataAccess\Eloquent\SaveTransactionalTrait;

    /** @var string */
    protected $table = 'entries';

    /** @var array */
    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * @param $limit
     * @param $page
     *
     * @return mixed
     */
    public function byPage($limit, $page, $admin)
    {
        if ($admin) {
            return $this->query()
                ->orderBy('priority', 'asc')
                ->orderBy('created_at', 'desc')
                ->skip($limit * ($page - 1))
                ->take($limit)
                ->get();
        }

        return $this->query()
            ->where('public', 1)
            ->orderBy('priority', 'asc')
            ->orderBy('created_at', 'desc')
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->get();
    }
}
