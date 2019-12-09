<?php

namespace AdpElasticMail\Exception;

use Exception;

class ElasticEmailTemplateApiException extends Exception
{
    protected $message = 'Unknown error with Elastic email API.';
}
