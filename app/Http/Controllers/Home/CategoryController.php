<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Repository\ArticleRepository;
use App\Repository\LikeRepository;
use App\Repository\AttendRepository;
use App\Repository\StoreRepository;
use App\Repository\CategoryRepository;
use App\Service\UsersService;
use App\Repository\SeoRepository;

class CategoryController extends Controller
{
    protected $article;
    protected $request;
    
    public function __construct(Request $request, ArticleRepository $article)
    {
        $this->article = $article;
        $this->request = $request;
    }
    
    /**
     * @description:分类页面
     * @author wuyanwen(2017年9月14日)
     */
    public function index($id, CategoryRepository $category, SeoRepository $seo)
    {
        $type = ($category->find('id', $id)->fid) ? true : false;
        
        return view('home.category.index',[
            'total' => $this->article->getCategotyTotal($id, $type),
            'id'    => $id,
            'seo'   => $seo->find('cid', $id),
        ]);
    }
    
    /**
     * @description:文章详情
     * @author wuyanwen(2017年9月14日)
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function detail($id,LikeRepository $like, AttendRepository $attend, StoreRepository $store)
    {
        $article_info = $this->article->find(intval($id));
        $user_id = $this->request->user('home') ? $this->request->user('home')->id : 0;
        return view('home.category.detail',[
            'article_info' => $article_info,
            'preNext'      => $this->article->getPreAndNext($id),
            'liked'        => $like->isLiked($user_id, $id),
            'stored'       => $store->isStored($user_id, $id),
            'attented'     => $attend->isAttended($user_id, $article_info->user_id),
            'user_id'      => $user_id,
        ]);
    }
    
    /**
     * 
     * @description:评论
     * @author wuyanwen(2017年9月17日)
     * @param
     */
    public function comment(Request $request, UsersService $user_service)
    {
        $data = $user_service->comment($request);
        $request->cookie();
        return is_array($data) ? $this->ajaxSuccess('评论成功', $data) : $this->ajaxError($data);

    }
}
