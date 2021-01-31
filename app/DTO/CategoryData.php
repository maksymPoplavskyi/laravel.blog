<?php


namespace App\DTO;


use App\Http\Requests\Admin\CategoryRequest;

class CategoryData
{
    /** @var string $categoryName */
    protected $categoryName;

    /**
     * @param CategoryRequest $request
     */
    public function __construct(CategoryRequest $request)
    {
        $this->setCategoryName($request->get('title'));
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    protected function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

}
