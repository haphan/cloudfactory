<?php

namespace Haphan\CloudFactory;

use Haphan\CloudFactory\Exception\InvalidProviderException;

class ProviderFactory
{
    /**
     * @param string $provider
     * @param array $parameters
     *
     * @return ClientInterface
     */
    public static function createClient($provider, array $parameters = [])
    {
        $mapping = self::getMapping();

        if (!isset($mapping[$provider])) {
            throw new InvalidProviderException(sprintf('Provider %s is unable to load'));
        }

        return new $mapping[$provider]($parameters);
    }

    protected static function getMapping()
    {
        $namespace = 'Haphan\\CloudFactory\\Client\\';

        return [
            Provider::OPEN_STACK    => $namespace . 'OpenStack',
            Provider::DIGITAL_OCEAN => $namespace . 'DigitalOcean',
            Provider::AZURE         => $namespace . 'Azure'
        ];
    }
}