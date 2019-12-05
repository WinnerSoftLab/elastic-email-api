<?php
declare(strict_types=1);

namespace AdpElasticMail;

interface ElasticEmailApiConstant
{
    const LOAD_TEMPLATE_URL = 'template/loadtemplate';
    const TEMPLATE_ID = 'templateID';

    //Elastic api responses
    const RESPONSE_TEMPLATE_NOT_FOUND = 'Could not find specified template id.';
}
