<?php

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'content', 'user_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function generator($request)
    {
        $this->title = $this->getTitle(strip_tags($request['content']));
        $this->content = $this->getContent($request['content']);
        $this->subtitle = $this->getSubTitle(strip_tags($this->content));
        $this->user_id = \Auth::user()->id;
        $this->category_id = $request['category_id'];

        if(request()->isMethod('put') || !$this->where('title',$this->title)->first()) {
            $this->save();
            return true;
        }
        return false;
    }

    /**
     * 提取标题 ##我是标题##
     * @param $content
     * @return mixed|string
     */
    public function getTitle($content)
    {
        preg_match_all('/##.+##/i', $content, $match);
        if($match[0]) {
            return str_replace('##', '', $match[0][0]);
        } else {
            return str_limit($content, 15, '');
        }
    }

    /**
     * 提取标题 ##我是标题##
     * @param $content
     * @return mixed|string
     */
    public function getSubTitle($content)
    {
        preg_match_all('/``.+``/i', $content, $match);
        if($match[0]) {
            return str_replace('``', '', $match[0][0]);
        } else {
            return str_limit($content, 150);
        }
    }

    /**
     * 正文中去掉标题，保存至数据库
     * @param $content
     * @return mixed
     */
    public function getContent($content)
    {
        $withSubTitle = preg_replace('/<(\w+)>##.+##.*<\/\1>/iU', '', $content);
        return preg_replace('/<(\w+)>``.+``.*<\/\1>/iU', '', $withSubTitle);
    }
}
