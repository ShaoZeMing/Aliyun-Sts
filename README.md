# Aliyun Sts for PHP

---
[![](https://travis-ci.org/ShaoZeMing/Aliyun-Sts.svg?branch=master)](https://travis-ci.org/ShaoZeMing/Aliyun-Sts) 
[![](https://img.shields.io/packagist/v/ShaoZeMing/aliyun-sts.svg)](https://packagist.org/packages/shaozeming/aliyun-sts) 
[![](https://img.shields.io/packagist/dt/ShaoZeMing/aliyun-sts.svg)](https://packagist.org/packages/stichoza/shaozeming/aliyun-sts)

> 这个项目的功能就是获取sts token, 功能虽然很单一，但和其他项目都是低耦合，如果你想使用oss,vod，...请访问他的兄弟项目 


## 同胞兄弟

- [ShaoZeMing/aliyun-vod](https://github.com/ShaoZeMing/Aliyun-Vod)
- [ShaoZeMing/aliyun-sts](https://github.com/ShaoZeMing/Aliyun-Sts)
- [ShaoZeMing/aliyun-core](https://github.com/ShaoZeMing/Aliyun-Core)
- [ShaoZeMing/aliyun-oss](https://github.com/ShaoZeMing/Aliyun-Oss)
- 待续...

## Installing

```shell
$ composer require shaozeming/aliyun-sts -v
```

### configuration 

拷贝项目下`src/config.php`到你项目中，进行配置其中sts。

配置示例代码：

```php


return [

    /*STS配置*/
    'sts' => [
        'AccessKeyID' => '****密码不给看****',
        'AccessKeySecret' => '****密码不给看****',
        'regionId' => 'cn-beijing',
        'endpoint' => 'sts.cn-beijing.aliyuncs.com',
        'roleArn' => 'acs:ram::1******38:role/aliyun*******rkfdale',  // 角色资源描述符，在RAM的控制台的资源详情页上可以获取
        'timeout' => '3600',  // 令牌过期时间
        'client_name' => 'client_name',  // setRoleSessionName可以不改
        // 在扮演角色(AssumeRole)时，可以附加一个授权策略，进一步限制角色的权限；
        // 详情请参考《RAM使用指南》
        // 这代表所有权限
        'policy' => [
            'Statement' => [
                [
                    'Action' => ["oss:*"],
                    'Effect' => 'Allow',
                    'Resource' => ["acs:oss:*:*:*"],
                ]
            ]
        ]
    ]
];


```

## Example


```php
use ShaoZeMing\AliSTS\Services\STSService;

 
        try {
            $config = include 'you_path/config.php';
            $sts = new STSService($config);
            $result =  $this->sts->getToken(); // 获取播放权限参数
            print_r($result);
            return $result;
        } catch (\Exception $e) {
            $err = "Error : 错误：" . $e->getMessage();
            echo $err . PHP_EOL;
        }
       


```

## License

MIT

