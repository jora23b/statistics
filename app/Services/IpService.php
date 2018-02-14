<?php
/**
 * Created by PhpStorm.
 * User: jorj
 * Date: 13.02.2018
 * Time: 22:32
 */

namespace App\Services;


use App\Ip;

class IpService
{
    public function getIpId($requestIp)
    {
        $ip = Ip::where('ip', $requestIp)->first();

        if ($ip) {
            return $ip->id;
        }

        $ip = new Ip();
        $ip->ip = $requestIp;
        $ip->save();

        return $ip->id;
    }
}