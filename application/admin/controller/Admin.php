<?php

namespace app\admin\controller;

use app\index\model\Blog;
use think\Controller;
use think\Request;
use think\Exception\HttpException;
use think\Session;
use think\Validate;

class Admin extends Controller
{

    use \traits\model\SoftDelete;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return json(Blog::all());
    }

    protected function checkToken($token)
    {
        $checkResult = $token === Session::get('__token__');
        if (!$checkResult) {
            throw new HttpException(403);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @param $__token__
     * @param $title
     * @param $content
     * @return \think\Response
     */
    public function create($__token__, $title, $content)
    {
        //
        // $validate = new Validate(['__token__' => 'require|token']);
        // $checkResult = $validate->check(['__token__' => $__token__]);
        $this->checkToken($__token__);
        $model = new Blog();
        $model->title = $title;
        $model->content = $content;

        $model->save();

        return json([]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     *
     *
     */
    public function save(Request $request)
    {
        $this->checkToken($request->post('__token__'));
        //
        $model = Blog::get($request->post('id'));
        if (!$model) {
            throw new HttpException(404);
        }
        $model->title = $request->post('title');
        $model->content = $request->post('content');

        $model->save();

        return json([]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($__token__, $id)
    {
        //
        $this->checkToken($__token__);
        $model = Blog::get($id);
        if (!$model) {
            throw new HttpException(404);
        }

        $model->delete();

        return json([]);
    }
}
