<?php

namespace Haphan\CloudFactory\Compute;

use Haphan\CloudFactory\ProviderCompatibleInterface;

interface RegionInterface extends ProviderCompatibleInterface
{
    public function getValueFor($provider);
}