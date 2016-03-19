<?php

namespace Haphan\CloudFactory\Client\OpenStack;

use Haphan\CloudFactory\ClientInterface;
use Haphan\CloudFactory\Compute\FlavourInterface;
use Haphan\CloudFactory\Compute\ImageInterface;
use Haphan\CloudFactory\Compute\RegionInterface;

class OpenStack implements ClientInterface
{

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function getServers()
    {
        // TODO: Implement getServers() method.
    }

    public function createServer(
        $name,
        RegionInterface $region,
        FlavourInterface $flavour,
        ImageInterface $image,
        $options = []
    ) {
        // TODO: Implement createServer() method.
    }

    public function getServer()
    {
        // TODO: Implement getServer() method.
    }

    public function destroyServer()
    {
        // TODO: Implement destroyServer() method.
    }

    public function getImages()
    {
        // TODO: Implement getImages() method.
    }

    public function getImage()
    {
        // TODO: Implement getImage() method.
    }

    public function destroyImage()
    {
        // TODO: Implement destroyImage() method.
    }

    public function createImage()
    {
        // TODO: Implement createImage() method.
    }

    public function getFlavors()
    {
        // TODO: Implement getFlavors() method.
    }

    public function getFlavor()
    {
        // TODO: Implement getFlavor() method.
    }
}