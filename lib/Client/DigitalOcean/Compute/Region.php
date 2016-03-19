<?php

namespace Haphan\CloudFactory\Client\DigitalOcean\Compute;

use DigitalOceanV2\Entity\Region as ApiRegion;
use Haphan\CloudFactory\Compute\RegionInterface;
use Haphan\CloudFactory\Exception\Exception;
use Haphan\CloudFactory\Exception\IncompatibleArgumentException;
use Haphan\CloudFactory\Provider;

class Region implements RegionInterface
{
    private $regionSlug;

    public function supports($provider)
    {
        return $provider == Provider::DIGITAL_OCEAN;
    }

    public function getValueFor($provider)
    {
        if (!$this->supports($provider)) {
            throw new IncompatibleArgumentException(sprintf('Provider %s is not supported.', $provider));
        }

        if ($provider == Provider::DIGITAL_OCEAN) {
            return $this->regionSlug;
        }

        // Should not go here
        throw new Exception(sprintf('Provider %s is supported but class %s is unable to return a value', $provider,
            get_class($this)));
    }

    public function createFromDigitalOcean(ApiRegion $region)
    {

    }
}
