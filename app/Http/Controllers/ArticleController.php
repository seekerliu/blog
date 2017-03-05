<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $article;
    private $category;

    public function __construct(Article $article, Category $category)
    {
        $this->middleware('auth')
            ->except(['category', 'show']);
        $this->article = $article;
        $this->category = $category;
    }

    public function index()
    {
        $items = $this->article->with('category','user')->paginate();
        return view('articles.index')->with(compact('items'));
    }

    public function create(Request $request)
    {
        $categoryPath = $request->input('category');
        $category = $this->category->getByPath($categoryPath);
        return view('articles.create')->with(compact('category'));
    }

    public function store(ArticleRequest $request)
    {
        $result = $this->article->generator($request->all());
        if($result)
            return redirect(route('articles.index'));
        $request->flash();
        return back()->withInput();
    }

    public function edit($id)
    {
        $item = $this->article->find($id);
        return view('articles.edit')->with(compact('item'));
    }

    public function update(Request $request, $id)
    {
        $article = $this->article->find($id);
        $result = $article->generator($request->all());
        if($result)
            return redirect(route('articles.index'));
        $request->flash();
        return back()->withInput();
    }

    public function show($id)
    {
        $article = $this->article->find($id);
        return view('articles.show')->with(compact('article'));
    }

    public function destroy($id)
    {
        $this->article->destroy($id);
        return back();
    }

    public function category($path = null)
    {
        $category = $this->category->where('path', $path)->first();
        if($category) {
            $articles = $this->article->with('user')->where('category_id', $category->id)->paginate();
        } else {
            $articles = $this->article->with('user')->paginate();
        }

        return view('articles.list')->with(compact('category', 'articles'));
    }
}
