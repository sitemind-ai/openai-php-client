<?php

namespace Sitemind\LLM\Factories;

use Sitemind\LLM\Config\ApiConfig;
use Sitemind\LLM\Drivers\OpenAI;
use Exception;

class ClientFactory
{
    public static function create(ApiConfig $config) {
        switch ($config->apiName) {
            case 'openai':
                return new OpenAI($config);
            default:
                throw new Exception("Invalid API name: $config->apiName");
        }
    }
}
