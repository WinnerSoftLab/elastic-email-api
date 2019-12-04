<?php
declare(strict_types=1);

namespace AdpElasticMail;

class ElasticEmailRequestBuilder
{
    /**
     * @param int $templateId
     *
     * @return ElasticEmailApiRequest
     */
    public function buildLoadTemplateRequest(int $templateId): ElasticEmailApiRequest
    {
        return new ElasticEmailApiRequest(
            ElasticEmailApiConstant::LOAD_TEMPLATE_URL,
            [ElasticEmailApiConstant::TEMPLATE_ID => $templateId]
        );
    }
}
