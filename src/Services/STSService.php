<?php

namespace ShaoZeMing\AliSTS\Services;


use ShaoZeMing\AliSTS\SDK\AssumeRoleRequest;
use ShaoZeMing\Aliyun\Core\DefaultAcsClient;
use ShaoZeMing\Aliyun\Core\Exception\ClientException;
use ShaoZeMing\Aliyun\Core\Exception\ServerException;
use ShaoZeMing\Aliyun\Core\Profile\DefaultProfile;

class STSService
{


    /**
     * @var
     */
    public $config;
    /**
     * @var
     */
    public $accessKeyID;
    /**
     * @var
     */
    public $accessKeySecret;
    /**
     * @var
     */
    public $endpoint;
    /**
     * @var
     */
    public $regionId;
    /**
     * @var
     */
    public $roleArn;
    /**
     * @var
     */
    public $tokenExpire;
    /**
     * @var
     */
    public $clientName;
    /**
     * @var
     */
    public $policy;

    /**
     * STSService constructor.
     * @param null $config
     */
    public function __construct($config = null)
    {

        $this->setConfig($config);
    }


    /**
     * User: ZeMing Shao
     * Email: szm19920426@gmail.com
     * @return mixed|\ShaoZeMing\Aliyun\Core\SimpleXMLElement
     * @throws ClientException
     * @throws ServerException
     */
    public function getToken()
    {


        DefaultProfile::addEndpoint($this->regionId, $this->regionId, "Sts", $this->endpoint);
        $iClientProfile = DefaultProfile::getProfile($this->regionId, $this->accessKeyID, $this->accessKeySecret);
        $client = new DefaultAcsClient($iClientProfile);
        $request = new AssumeRoleRequest();
        $request->setRoleSessionName($this->clientName);
        $request->setRoleArn($this->roleArn);
        $request->setPolicy($this->policy);
        $request->setDurationSeconds($this->tokenExpire);
        $response = $client->getAcsResponse($request);
        return $response;

    }


    /**
     * User: ZeMing Shao
     * Email: szm19920426@gmail.com
     * @param $config
     */
    public function setConfig($config)
    {

        $this->config = $config ?: include dirname(__DIR__) .  DIRECTORY_SEPARATOR.'config.php';

        $this->accessKeyID = $this->config['sts']['AccessKeyID'];
        $this->accessKeySecret = $this->config['sts']['AccessKeySecret'];
        $this->endpoint = $this->config['sts']['endpoint'];
        $this->regionId = $this->config['sts']['regionId'];
        $this->roleArn = $this->config['sts']['roleArn'];
        $this->tokenExpire = $this->config['sts']['timeout'];
        $this->clientName = $this->config['sts']['client_name'];
        $this->policy = \json_encode($this->config['sts']['policy']);


    }



}
