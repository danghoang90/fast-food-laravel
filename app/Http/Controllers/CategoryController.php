<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('backend.Categories.list', compact('category'));
    }

    public function create()
    {
        return view('backend.Categories.add');
    }

    public function store(Request $request)
    {
        $category = Category::all();
        if ($request->name != null){
            foreach ($category as $cate)
            if ($request->name === $cate->name) {
                return redirect()->back()->withErrors(['error' => 'Thể Loại Đã Tồn Tại ! ']);
            }
        }
        $request->validate([
            'name' => 'required',
        ]);
        $categories = new Category();
        $categories->name = $request->name;
        $categories->save();
         return redirect()->route('categories.list')->with('success', 'Thêm thành công Thể Loại!');
    }

    public function destroy($id)
    {
        if (Gate::allows('user-crud')) {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('categories.list')->with('success', 'Đã Xoá thành công !');
        }else {
            abort(403);
        }
    }

    public function update($id)
    {
        if (Gate::allows('user-crud')) {
            $category = Category::findOrFail($id);
            return view('backend.categories.edit', compact('category'));
        }else {
            abort(403);
        }
    }

    public function edit(Request $request, $id)
    {
        $category = Category::all();
        if ($request->name != null){
            foreach ($category as $cate)
                if ($request->name === $cate->name) {
                    return redirect()->back()->withErrors(['error' => 'Thể Loại Đã Tồn Tại ! ']);
                }
        }
        $request->validate([
            'name' => 'required',
        ]);
        $categories = Category::findOrFail($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('categories.list')->with('success', 'Sửa thành công Thể Loại!');
    }
}
