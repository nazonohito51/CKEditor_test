<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Comment;

/**
 * Class CommentRepository
 */
class CommentRepository implements CommentRepositoryInterface
{
    /** @var Comment */
    protected $eloquent;

    /**
     * @param Comment   $eloquent
     */
    public function __construct(Comment $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function allByEntry($id)
    {
        $result = $this->eloquent->getAllByEntryId($id);

        return $result;
    }

    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params)
    {
        $result = $this->eloquent->fill($params)->save();
        return $result;
    }
}
