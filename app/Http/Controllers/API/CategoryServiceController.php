<?php

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryServiceController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response([
            'message' => 'list book found!',
            'data' => $this->category->withCategory(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|min:3|max:100|unique:categories',],
            [
                'category_name.required' =>'category is required',
                'category_name.min' =>'category must be at least 3 character',
                'category_name.unipue' =>'category haas already on database',
            ]);

            $category = Category::create([
                'category_name' => $request->category_name
            ]);

            return response([
                'message' => 'category cerated succesfully',
                'data' => $category,
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::find($id);

        return view("categories.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ],[
            'category_name.required' => "Category is required boss!!",
            'category_name.unique' => "Category has already on database my bos!!",
        ]);

        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->save();

        return redirect("/admin/category")->with("success", "category has been updated!");    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->category->FindOrFail($id);
        $category->delete($id);

        return response([
            'message' => 'category cerated succesfully',
            'data' => $category,
        ], 201);
    }
}
