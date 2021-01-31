<?php


namespace App\Repositories;


use App\DTO\CategoryData;
use App\Models\Category;
use Exception;

class CategoryRepository extends BaseRepository
{
    /** @return Category */
    public function getModel(): Category
    {
        return Category::getModel();
    }

    /**
     * @param CategoryData $dto
     * @return Category
     */
    public function store(CategoryData $dto): Category
    {
        return $this->getModel()::create([
            'title' => $dto->getCategoryName()
        ]);
    }

    /**
     * @param Category $category
     * @param CategoryData $dto
     */
    public function update(Category $category, CategoryData $dto)
    {
        $category->update([
            'title' => $dto->getCategoryName(),
            'slug' => null
        ]);
    }

    /**
     * @param Category $category
     * @throws Exception
     */
    public function delete(Category $category)
    {
        $category->delete();
    }
}
