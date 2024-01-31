<?php


namespace App\Src\Giphy\Domain\Entity;

class Log
{
    private $service;
    private $requestBody;
    private $responseBody;
    private $responseCode;
    private $ipSource;
    private $userName;
    private $userEmail;
    private $userId;

    public function __construct(
        string $service,
        string $requestBody,
        string $responseBody,
        string $responseCode,
        string $ipSource,
        string $userEmail=null,
        string $userName=null,
        int $userId=null
    ) {
        $this->service = $service;
        $this->requestBody = $requestBody;
        $this->responseBody = $responseBody;
        $this->responseCode = $responseCode;
        $this->ipSource = $ipSource;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userId = $userId;

    }




    /**
     * Get the value of service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of requestBody
     */
    public function getRequestBody()
    {
        return $this->requestBody;
    }

    /**
     * Set the value of requestBody
     *
     * @return  self
     */
    public function setRequestBody($requestBody)
    {
        $this->requestBody = $requestBody;

        return $this;
    }

    /**
     * Get the value of responseBody
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Set the value of responseBody
     *
     * @return  self
     */
    public function setResponseBody($responseBody)
    {
        $this->responseBody = $responseBody;

        return $this;
    }

    /**
     * Get the value of responseCode
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Set the value of responseCode
     *
     * @return  self
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;

        return $this;
    }

    /**
     * Get the value of ipSource
     */
    public function getIpSource()
    {
        return $this->ipSource;
    }

    /**
     * Set the value of ipSource
     *
     * @return  self
     */
    public function setIpSource($ipSource)
    {
        $this->ipSource = $ipSource;

        return $this;
    }

    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of userEmail
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set the value of userEmail
     *
     * @return  self
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
}