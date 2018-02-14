<?php
/**
 * Created by PhpStorm.
 * User: jorj
 * Date: 13.02.2018
 * Time: 22:32
 */

namespace App\Services;

use App\UserAgent;

class UserAgentService
{
    public function getUserAgentId($requestUserAgent)
    {
        $userAgent = UserAgent::where('user_agent', $requestUserAgent)->first();

        if ($userAgent) {
            return $userAgent->id;
        }

        $userAgent = new UserAgent();
        $userAgent->user_agent = $requestUserAgent;
        $userAgent->save();

        return $userAgent->id;
    }
}