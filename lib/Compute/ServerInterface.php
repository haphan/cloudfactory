<?php

namespace Haphan\CloudFactory\Compute;

use Haphan\CloudFactory\ProviderCompatibleInterface;

interface ServerInterface extends ProviderCompatibleInterface
{
    public function getValueFor($provider);
}
