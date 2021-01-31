<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /** @var CategoryRepository $categoryRepository */
    private $categoryRepository;
    /** @var CategoryService $categoryService */
    private $categoryService;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryRepository $categoryRepository, CategoryService $categoryService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Category $category
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $this->categoryService->update($category, $request);

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function delete(Category $category)
    {
        $this->categoryService->delete($category);

        return redirect()->route('categories.index');
    }
}
