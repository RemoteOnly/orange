<?php
/**
 * Created by PhpStorm.
 * User: yangyida
 * Date: 2017/2/7
 * Time: 20:43
 */

namespace App\Admin\Extensions\Tool;


use Encore\Admin\Grid\Tools\AbstractTool;


class CreateAttrValue extends AbstractTool
{
    public function render()
    {
        return view('admin.extensions.tool.create_attr_value');
    }
}