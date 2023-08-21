<?php

namespace App\Http\Controllers;

use App\Service\Category\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(
        CategoryInterface $categoryInterface
    ) {
        $this->categoryInterface = $categoryInterface;
    }


    public function index()
    {
        $data['categories'] = $this->categoryInterface->getAllCategories();
        return view('admin.category.index', $data);
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $requests)
    {
        $requests->validate([
            'catagory_name' => 'required|string',
            'catagory_slug' => 'required|string|unique:categories',
        ]);
        $data = $requests->only('catagory_name', 'catagory_slug');
        if ($this->categoryInterface->storeCategory($data)) {
            return redirect()->route('categories.index')->with('msg', 'Category created successfully');
        } else {
            return back()->with('msg', 'Some Error Occur, Try again');
        }
    }


    public function show($id)
    {
    }

    
    public function edit($c_slug)
    {
        $slug = decrypt($c_slug);
       
        $data['category'] = $this->categoryInterface->getCategoryBySlug($slug);
        return view('admin.category.edit', $data);
    }

   
    public function update(Request $request, $slug)
    {

        $request->validate([
            'catagory_name' => 'required|string',
        ]);
        $data = $request->only('catagory_name');
        if ($this->categoryInterface->updateCategory($data, $slug)) {
            return redirect()->route('categories.index')->with('msg', 'Category updated successfully');
        } else {
            return back()->with('msg', 'Some error occur try again');
        }
    }

   
    public function destroy($slug)
    {
       if($this->categoryInterface->deleteCat($slug)){
        return back()->with('msg', 'Data deleted successfully');
       }else{
        return back()->with('msg', 'Some error occur');
       }
    }
}
