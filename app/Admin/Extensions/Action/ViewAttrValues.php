<?php
/**
 * Created by PhpStorm.
 * User: yangyida
 * Date: 2017/2/7
 * Time: 19:11
 */
namespace App\Admin\Extensions\Action;

use Encore\Admin\Facades\Admin;

class ViewAttrValues
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.grid-check-row').on('click', function () {

    // Your code.
    console.log($(this).data('id'));

});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        return "<a class='btn btn-xs btn-success fa fa-check grid-check-row' data-id='{$this->id}'></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}