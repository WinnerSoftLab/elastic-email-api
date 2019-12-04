<?php
declare(strict_types=1);

namespace AdpElasticMail\Tests;

use AdpElasticMail\ElasticEmailApiClient;
use AdpElasticMail\ElasticEmailApiRequest;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ElasticEmailApiClientTest extends TestCase
{

    public function testSendRequest()
    {
        $body = $this->createMock(StreamInterface::class);
        $body->expects($this->once())->method('getContents')
            ->willReturn(json_encode(['success' => true, 'data' => ['templateBody' => 'mock template body']]));
        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())->method('getBody')->willReturn($body);
        $data = ['templateID' => 666];
        $request = new ElasticEmailApiRequest('template/loadtemplate', $data);
        /** @var ClientInterface|MockObject $httpClient */
        $httpClient = $this->createMock(Client::class);
        $httpClient->expects($this->once())->method('request')
            ->with('POST', 'template/loadtemplate', ['form_params' => ['templateID' => 666, 'apikey' => 'mock api key']])
            ->willReturn($response);
        $apiClient = new ElasticEmailApiClient($httpClient, 'mock api key');
        $this->assertEquals(
            ['templateBody' => 'mock template body'],
             $apiClient->sendRequest($request)
        );
    }
}
