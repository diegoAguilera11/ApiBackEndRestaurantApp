<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::orderBy('id')->get();
    }

    public function store(Request $request)
    {
        $request->request->add(['name' => Str::upper($request->name)]);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 400,
                'from' => 'categorys'

            ]);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 200,
            'category' => $category,
            'from' => 'categorys'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['name' => Str::upper($request->name)]);

        $category = Category::find($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories,name,' . $category->id],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 400,
                'from' => 'categorys'

            ]);
        }

        if ($category) {
            $category->name = $request->name;
            $category->save();

            return response()->json([
                'status' => 201,
                'product' => $category,
                'from' => 'categorys'
            ]);
        }
    }

    public function destroy(Category $category)
    {
        $example = $category->delete();
        return response()->json([
            'status' => 201,
            'category' => $example
        ]);
    }
}
