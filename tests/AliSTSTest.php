<?php

namespace ShaoZeMing\AliSTS\Test;

use PHPUnit\Framework\TestCase;
use ShaoZeMing\AliSTS\Services\STSService;


class AliSTSTest extends TestCase
{
    protected $sts;

    public function setUp()
    {

        $this->sts = new STSService();

    }


    public function testVodManager()
    {
        $this->assertInstanceOf(STSService::class, $this->sts);
    }


    public function testPush()
    {
        echo PHP_EOL . "aliyun  STS test 中...." . PHP_EOL;
        try {

            $result =  $this->sts->getToken(); // 获取播放权限参数
            print_r($result);
            return $result;
        } catch (\Exception $e) {
//
            $err = "Error : 错误：" . $e->getMessage();
            echo $err . PHP_EOL;

        }
    }
}
