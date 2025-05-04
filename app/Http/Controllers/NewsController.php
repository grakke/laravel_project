<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 7/27/19
 * Time: 12:09 AM
 */

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * 推荐列表
     */
    public function recommend()
    {
        $list = News::where('is_recommend', 1)->get();
        foreach ($list as $key => $value) {
            $list[$key]->created = $list[$key]->created_at->diffForHumans();
        }
        return $list;
    }


    /**
     * 新闻列表
     */
    public function index()
    {
        $list = News::get();
        foreach ($list as $key => $value) {
            $list[$key]->created = $list[$key]->created_at->diffForHumans();
        }
        return $list;
    }

    /**
     * 新闻详情
     */
    public function show($id)
    {
        $row = News::findOrFail($id);
        return $row;
    }
}
