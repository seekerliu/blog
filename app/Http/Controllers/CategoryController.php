<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }
    public function index()
    {
        $items = $this->category->all();
        return view('categories.index')->with(compact('items'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->category->create($request->all());
        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $item = $this->category->find($id);
        return view('categories.edit')->with(compact('item'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->find($id);
        $result = $category->update($request->all());
        if($result)
            return redirect(route('categories.index'));
        $request->flash();
        return back()->withInput();
    }

    public function destroy($id)
    {
        if(!$this->category->articles) {
            $this->category->destroy($id);
        }
        return back();
    }
}
