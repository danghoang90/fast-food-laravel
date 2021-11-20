<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Category;
use App\Models\Food;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;

class FoodController extends Controller
{
    private $food;
    private $category;
    public function __construct(Food $food, Category $category)
    {
        $this->food = $food;
        $this->category = $category;
    }
    public function index()
    {
        $listFood = Food::paginate(4);
        return view('backend.foods.list', compact('listFood'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.foods.add', compact('categories'));
    }
    public function store(CreateFoodRequest $request)
    {

        DB::beginTransaction();
        try {
            $food = new Food();
            $food->name = $request->name;
            $food->desc = $request->desc;
            $food->image = $request->file('image')->store('image','public');
            $food->status = $request->status;
            $food->price = $request->price;
            $food->save();
            $food->category()->sync($request->category);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('foods.list')->with('success', 'Thêm thành công sản phẩm !');
    }

    public function destroy($id)
    {
        if (Gate::allows('user-crud')) {
            $food = Food::findOrFail($id);
            $food->category()->detach();
            $food->delete();
            return redirect()->route('foods.list')->with('success', 'Đã Xoá thành công !');
        }else {
            abort(403);
        }

    }

    public function update($id)
    {
        if (Gate::allows('user-crud')) {
            $food = Food::findOrFail($id);
            $categories = Category::all();
            return view('backend.foods.edit', compact('food','categories'));
        }else {
            abort(403);
        }

    }

    public function edit(UpdateFoodRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $food = Food::findOrFail($id);
            $food->name = $request->name;
            $food->desc = $request->desc;
            Storage::delete('public/' . $food->image);
            $food->image = $request->file('image')->store('image','public');
            $food->status = $request->status;
            $food->price = $request->price;
            $food->save();
            $food->category()->sync($request->category);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('foods.list')->with('success', 'Đã sửa thành công sản phẩm !');
    }

    public function search(Request $request)
    {
        $product = Food::where('name','like','%'.$request->key.'%')->paginate(4);
        return view('backend.foods.search', compact('product'));
    }

    public function detailFood($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::all();
        return view('backend.foods.detail', compact('food','categories'));
    }
}
