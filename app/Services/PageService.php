<?php
/**
 * Created by PhpStorm.
 * User: jorj
 * Date: 13.02.2018
 * Time: 22:32
 */

namespace App\Services;


use App\Page;

class PageService
{
    public function getPageId($requestUrl)
    {
        $page = Page::where('url', $requestUrl)->first();

        if ($page) {
            return $page->id;
        }

        $page = new Page();
        $page->url = $requestUrl;
        $page->save();

        return $page->id;
    }
}