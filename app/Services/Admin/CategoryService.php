<?php


namespace App\Services\Admin;


use App\DTO\CategoryData;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    /** @var $categoryRepository CategoryRepository */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param CategoryRequest $request
     */
    public function store(CategoryRequest $request)
    {
        $dto = new CategoryData($request);
        $this->categoryRepository->store($dto);
    }

    /**
     * @param Category $category
     * @param CategoryRequest $request
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $dto = new CategoryData($request);
        $this->categoryRepository->update($category, $dto);
    }

    /**
     * @param Category $category
     */
    public function delete(Category $category)
    {
        $this->categoryRepository->delete($category);
    }
}
