<?php
declare(strict_types=1);

namespace AdpElasticMail\Tests;

use AdpElasticMail\ElasticEmailApiRequest;
use AdpElasticMail\ElasticEmailRequestBuilder;
use PHPUnit\Framework\TestCase;

class ElasticEmailRequestBuilderTest extends TestCase
{
    public function testBuildLoadTemplateRequest()
    {
        $id = 12345678;
        $expected = new ElasticEmailApiRequest('template/loadtemplate',
            ['templateID' => $id]);
        $builder = new ElasticEmailRequestBuilder();
        $this->assertEquals($expected, $builder->buildLoadTemplateRequest($id));
    }
}
