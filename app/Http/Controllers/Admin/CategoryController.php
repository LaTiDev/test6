<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequets;
use App\Http\Requests\Category\UpdateCategoryRequets;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.listCate', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.category.addCate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequets $request)
    {
        try {
            Category::create($request->all());

            return redirect()->route('category.index')->with('success', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Thêm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.category.editCate', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequets $request, Category $category)
    {
        try {
            $category->update($request->all());

            return redirect()->route('category.index')->with('success', 'Sửa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()->route('category.index')->with('success', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();

        return view('admin.category.trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();

        return redirect()->route('category.index')->with('success', 'Khôi phục thành công');
    }

    public function forceDelete($id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();

        return redirect()->route('category.trash')->with('success', 'Xóa vĩnh viễn thành công');
    }
}
