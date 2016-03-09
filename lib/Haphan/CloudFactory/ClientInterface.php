<?php

namespace Haphan\CloudFactory;

use Haphan\CloudFactory\Compute\FlavourInterface;
use Haphan\CloudFactory\Compute\ImageInterface;
use Haphan\CloudFactory\Compute\RegionInterface;

interface ClientInterface
{
    // Client specified interface
    public function getName();

    // Cloud Compute Engine
    public function getServers();

    /**
     * @param $name
     * @param RegionInterface $region
     * @param FlavourInterface $flavour
     * @param ImageInterface $image
     * @param array $options
     * @return mixed
     */
    public function createServer(
        $name,
        RegionInterface $region,
        FlavourInterface $flavour,
        ImageInterface $image,
        $options = []
    );

    public function getServer();

    public function destroyServer();

    public function getImages();

    public function getImage();

    public function destroyImage();

    public function createImage();

    public function getFlavors();

    public function getFlavor();
}