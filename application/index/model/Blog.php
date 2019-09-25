<?php

namespace app\index\model;

use think\Model;


/**
 * Class Blog
 * @package app\index\model
 * @property $id
 * @property $title
 * @property $content
 */
class Blog extends Model
{
    use \traits\model\SoftDelete;
    protected $deleteTime = 'delete_time';
    //
}
