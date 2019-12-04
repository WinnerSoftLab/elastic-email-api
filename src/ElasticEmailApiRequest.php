<?php
declare(strict_types=1);

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
    public function __construct(string $url, array $data, string $method = 'POST')
    {
        $this->url = $url;
        $this->data = $data;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}
