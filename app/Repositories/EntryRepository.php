<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Entry;

class EntryRepository implements EntryRepositoryInterface
{
    /** @var Entry */
    protected $eloquent;

    /**
     * @param Entry $eloquent
     */
    public function __construct(Entry $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function save(array $params)
    {
        $attributes = [];
        $attributes['id'] = (isset($params['id'])) ? $params['id'] : null;
        $result = $this->eloquent->updateOrCreate($attributes, $params);
        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->eloquent->find($id);

        return $result;
    }

    /**
     * @return int
     */
    public function count()
    {
        $result = $this->eloquent->count();

        return $result;
    }

    /**
     * @param int $page
     * @param int $limit
     *
     * @return \stdClass
     */
    public function byPage($page = 1, $limit = 20, $admin = 0)
    {
        $key = "entry_page:{$page}:{$limit}";
        $entries = $this->eloquent->byPage($limit, $page, $admin);

        return $entries;
    }
}
