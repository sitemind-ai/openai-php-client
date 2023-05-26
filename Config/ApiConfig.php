<?php

namespace Sitemind\LLM\Config;

class ApiConfig
{
    public function __construct(
        public string $apiName, 
        public ?string $apiKey = null
    )
    {
        
    }
}
