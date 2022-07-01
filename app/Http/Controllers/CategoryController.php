<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(CategoryCreateRequest $request): JsonResponse
    {
        try {
            $category = Category::create(array_filter($request->all(), fn($val) => !is_null($val)));
            return response()->json([
                'message' => 'Category Added Successfully!',
                'category' => $category->toArray()
            ]);
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json([
            'data' => $category?->categories,
            'category_name' => $category?->name
        ]);
    }

}
