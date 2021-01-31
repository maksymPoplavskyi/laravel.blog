<?php


namespace App\Repositories;


use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;

class PostRepository extends BaseRepository
{

    /**
     * @return Post
     */
    public function getModel(): Post
    {
        return Post::getModel();
    }

    /**
     * @param array $fields
     * @return Post
     */
    public function add(array $fields): Post
    {
        $this->getModel()->fill($fields);
        $this->getModel()->user_id = 1;

        $this->getModel()->save();

        return $this->getModel();
    }


    public function edit($fields)
    {
        $this->getModel()->update($fields);
    }

    public function remove()
    {
        Storage::delete("uploads/$this->image");

        try {
            $this->getModel()->delete();
        } catch (\Exception $e) {
        }
    }

    /**
     * @param integer $id
     */
    public function setCategory(int $id)
    {
        if ($id == null) return;

        $this->getModel()->category_id = $id;
        $this->getModel()->save();
    }

    /**
     * @param array $ids
     */
    public function setTags(array $ids)
    {
        if ($ids == null) return;

        $this->getModel()->sync($ids);
    }

    public function setDraft()
    {
        $this->getModel()->status = $this->getModel()::IS_DRAFT;
    }

    public function setPublic()
    {
        $this->getModel()->status = $this->getModel()::IS_PUBLIC;
    }

    public function toggleStatus($status)
    {
        return ($status === $this->getModel()::IS_PUBLIC) ? $this->setPublic() : $this->setDraft();
    }

    public function setStandard()
    {
        $this->getModel()->is_featured = $this->getModel()::IS_STANDARD;
    }

    public function setFeatured()
    {
        $this->getModel()->is_featured = $this->getModel()::IS_FEATURED;
    }

    public function toggleFeatured($status)
    {
        return ($status === $this->getModel()::IS_FEATURED) ? $this->setFeatured() : $this->setStandard();
    }
}
