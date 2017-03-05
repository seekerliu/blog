<?php
/**
 * author: seekerliu
 * createTime: 2017/3/4 下午7:43
 * Description:
 */

namespace App\Http\ViewComposers;
use App\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $category;

    /**
     * CategoryComposer constructor.
     * @param $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->category->all());
    }


}