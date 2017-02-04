<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class BaseController extends Controller
{
    protected function _render($body, $header = '', $description = '')
    {
        return Admin::content(function (Content $content) use ($body, $header, $description) {
            $content->header($header);
            $content->description($description);
            $content->body($body);
        });
    }
}
