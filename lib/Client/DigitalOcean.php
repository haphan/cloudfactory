<?php

namespace Haphan\CloudFactory\Client;

use DigitalOceanV2\Adapter\GuzzleAdapter;
use DigitalOceanV2\DigitalOceanV2;
use Haphan\CloudFactory\ClientInterface;
use Haphan\CloudFactory\Compute\FlavourInterface;
use Haphan\CloudFactory\Compute\ImageInterface;
use Haphan\CloudFactory\Compute\RegionInterface;
use Haphan\CloudFactory\Exception\IncompatibleArgumentException;
use Haphan\CloudFactory\Exception\RequiredParameterNotFoundException;
use Haphan\CloudFactory\Provider;

class DigitalOcean implements ClientInterface
{
    const TOKEN = 'token';
    const NAME = Provider::DIGITAL_OCEAN;

    private $requiredParams = [self::TOKEN];

    private $optionalParams = [];

    private $params = null;

    /**@var DigitalOceanV2 */
    private $digitalOcean = null;

    public function __construct(array $params = [])
    {
        if (!$this->validParams($params)) {
            throw new RequiredParameterNotFoundException(
                sprintf(
                    'Required parameters not found. %s requires parameters: %s',
                    get_class($this),
                    implode(', ', $this->requiredParams)
                )
            );
        }

        $this->params = $params;
    }

    /**
     * Lazy initialise API client instance.
     */
    private function init()
    {
        static $initialised = false;

        if (!$initialised) {
            $this->digitalOcean = new DigitalOceanV2(new GuzzleAdapter($this->params[self::TOKEN]));
            $initialised = true;
        }
    }

    /**
     * Validate input parameters. Returns false if $params does not have all required keys.
     *
     * @param array $params
     *
     * @return bool
     */
    private function validParams(array $params)
    {
        if (count(array_intersect_key(array_flip($this->requiredParams), $params)) === count($this->requiredParams)) {
            return true;
        }

        return false;
    }

    public function getServers()
    {
        $this->init();

        return $this->digitalOcean->droplet()->getAll();
    }

    public function createServer(
        $name,
        RegionInterface $region,
        FlavourInterface $flavour,
        ImageInterface $image,
        $options = []
    ) {
        $this->init();

        $provider = $this->getName();

        if (!$region->supports($provider) || !$flavour->supports($provider) || !$image->supports($provider)) {
            throw new IncompatibleArgumentException(
                sprintf('Cannot create server because one of the required parameters is incompatible.')
            );
        }

        $defaultOptions = [
            'ssh_keys' => [],
            'backups' => false,
            'ipv6' => false,
            'private_networking' => false,
            'user_data' => null,
        ];

        $options = array_merge($defaultOptions, $options);

        $this->digitalOcean->droplet()->create(
            $name,
            $region->getValueFor($provider),
            $flavour->getValueFor($provider),
            $image->getValueFor($provider),
            $options['backups'],
            $options['ipv6'],
            $options['private_networking'],
            $options['ssh_keys'],
            $options['user_data']
        );
    }

    public function getName()
    {
        return self::NAME;
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
