<?php

namespace app\admin\controller;

use think\Controller;
use think\exception\HttpException;
use think\Request;
use think\Session;
use think\Validate;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($__token__)
    {
        // 返回是否已登陆的状态
        //$validate = new Validate(['__token__' => 'require|token']);
        //$checkResult = $validate->check(['__token__' => $__token__]);
        $checkResult = $__token__ === Session::get('__token__');
        if (!$checkResult) {
            throw new HttpException(403);
        }
        return json([]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @param $request
     * @return \think\Response
     */
    public function create(Request $request)
    {
        //
        $pass = input('request.pass');
        if (config('password') === $pass) {
            return json(['__token__' => $request->token()]);
        }
        throw new HttpException(403);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
    public function delete($id)
    {
        //
    }
}
