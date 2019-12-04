<?php
declare(strict_types=1);

namespace AdpElasticMail;

interface ElasticEmailApiConstant
{
    const LOAD_TEMPLATE_URL = 'template/loadtemplate';
    const TEMPLATE_ID = 'templateID';

    //MONITORING
    const MONITORING_ERROR = 'elastic_email_api.error';

    //Elastic api responses
    const RESPONSE_TEMPLATE_NOT_FOUND = 'Could not find specified template id.';
}
