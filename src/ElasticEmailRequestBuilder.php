<?php

namespace AdpElasticMail;

class ElasticEmailRequestBuilder
{
    /**
     * @param int $templateId
     *
     * @return ElasticEmailApiRequest
     */
    public function buildLoadTemplateRequest($templateId)
    {
        return new ElasticEmailApiRequest(
            ElasticEmailApiConstant::LOAD_TEMPLATE_URL,
            [ElasticEmailApiConstant::TEMPLATE_ID => $templateId]
        );
    }
}
