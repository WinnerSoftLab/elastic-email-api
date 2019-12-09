<?php

namespace AdpElasticMail;

class ElasticEmailApiRequest
{
    /** @var string */
    private $url;

    /** @var array */
    private $data;

    /** @var string */
    private $method;

    /**
     * ElasticEmailApiRequest constructor.
     *
     * @param string $url
     * @param array  $data
     * @param string $method
     */
    public function __construct($url, array $data, $method = 'POST')
    {
        $this->url = $url;
        $this->data = $data;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}
