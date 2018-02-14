<?php
/**
 * Created by PhpStorm.
 * User: jorj
 * Date: 13.02.2018
 * Time: 22:32
 */

namespace App\Services;

use App\View;
use Carbon\Carbon;

class ViewService
{
    protected $model;

    public function __construct(View $view)
    {
        $this->model = $view;
    }

    public function setView($data)
    {
        if (!$data['url']) {
            return;
        }

        $this->saveView([
            'ip_id' => (new IpService())->getIpId($data['ip']),
            'page_id' => (new PageService())->getPageId($data['url']),
            'user_agent_id' => (new UserAgentService())->getUserAgentId($data['user_agent']),
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function saveView($data)
    {
        $view = $this->getRowByPageAgentAndIp($data['page_id'], $data['user_agent_id'], $data['ip_id']);

        if ($view) {
            $view->count++;
            $view->date = $data['date'];
            $view->save();

            return;
        }

        $view = new $this->model;
        $view->fill($data);
        $view->save();
    }

    public function getRowByPageAgentAndIp($page_id, $user_agent_id, $ip_id)
    {
        return $this->model->where('page_id', $page_id)
            ->where('user_agent_id', $user_agent_id)
            ->where('ip_id', $ip_id)
            ->first();
    }

}