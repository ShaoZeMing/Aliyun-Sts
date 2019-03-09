<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
namespace ShaoZeMing\AliSTS\SDK;



use ShaoZeMing\Aliyun\Core\RpcAcsRequest;

class AssumeRoleRequest extends RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Sts", "2015-04-01", "AssumeRole");
		$this->setProtocol("https");
		$this->setMethod("POST");
	}

	private  $roleArn;

	private  $roleSessionName;

	private  $durationSeconds;

	private  $policy;

	public function getRoleArn() {
		return $this->roleArn;
	}

	public function setRoleArn($roleArn) {
		$this->roleArn = $roleArn;
		$this->queryParameters["RoleArn"]=$roleArn;
	}

	public function getRoleSessionName() {
		return $this->roleSessionName;
	}

	public function setRoleSessionName($roleSessionName) {
		$this->roleSessionName = $roleSessionName;
		$this->queryParameters["RoleSessionName"]=$roleSessionName;
	}

	public function getDurationSeconds() {
		return $this->durationSeconds;
	}

	public function setDurationSeconds($durationSeconds) {
		$this->durationSeconds = $durationSeconds;
		$this->queryParameters["DurationSeconds"]=$durationSeconds;
	}

	public function getPolicy() {
		return $this->policy;
	}

	public function setPolicy($policy) {
		$this->policy = $policy;
		$this->queryParameters["Policy"]=$policy;
	}

}
