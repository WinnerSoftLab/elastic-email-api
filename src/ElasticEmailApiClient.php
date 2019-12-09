<?php

namespace AdpElasticMail;

use AdpElasticMail\Exception\ElasticEmailTemplateApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class ElasticEmailApiClient
{
    const API_KEY_FIELD = 'apikey';
    /** @var Client */
    private $httpClient;

    /** @var string */
    private $apiKey;

    /**
     * ElasticEmailApiClient constructor.
     *
     * @param Client $httpClient
     * @param string $apiKey
     */
    public function __construct(Client $httpClient, $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    /**
     * @param ElasticEmailApiRequest $request
     *
     * @return array
     *
     * @throws ElasticEmailTemplateApiException
     * @throws GuzzleException
     */
    public function sendRequest(ElasticEmailApiRequest $request)
    {
        $data = $request->getData();
        $data[self::API_KEY_FIELD] = $this->apiKey;
        $response = $this->httpClient->request(
            $request->getMethod(),
            $request->getUrl(),
            [RequestOptions::FORM_PARAMS => $data]
        )->getBody()->getContents();
        $response = json_decode($response, true);

        if (empty($response) || empty($response['success']) || empty($response['data'])) {
            if (!empty($response['error']) && ElasticEmailApiConstant::RESPONSE_TEMPLATE_NOT_FOUND === $response['error']) {
                throw new ElasticEmailTemplateApiException(ElasticEmailApiConstant::RESPONSE_TEMPLATE_NOT_FOUND);
            }
            throw new ElasticEmailTemplateApiException();
        }

        return $response['data'];
    }
}
