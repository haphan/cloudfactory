<?php

namespace Haphan\CloudFactory;

interface ProviderCompatibleInterface
{
    public function supports($provider);
    public function getValueFor($provider);
}