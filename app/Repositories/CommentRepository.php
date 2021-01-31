<?php


namespace App\Repositories;


use App\Models\Comment;

class CommentRepository extends BaseRepository
{

    public function getModel(): Comment
    {
        return Comment::getModel();
    }

    public function allow()
    {
        return $this->getModel()->status = $this->getModel()::IS_ALLOW;
    }

    public function disallow()
    {
        return $this->getModel()->status = $this->getModel()::IS_DISALLOW;
    }

    public function toggleAllow($isAllow)
    {
        return ($isAllow === $this->getModel()::IS_ALLOW) ? $this->allow() : $this->disallow();
    }

    public function remove()
    {
        try {
            $this->getModel()->delete();
        } catch (\Exception $e) {
        }
    }
}
