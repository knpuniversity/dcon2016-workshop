<?php

namespace Drupal\beignet\Controller;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BeignetController implements ContainerInjectionInterface
{
    private $configFactory;

    public function __construct(ConfigFactoryInterface $configFactory)
    {
        $this->configFactory = $configFactory;
    }

    public static function create(ContainerInterface $container)
    {
        return new self($container->get('config.factory'));
    }

    public function eatBeignets($number)
    {
        if ($number === null) {
            $config = $this->configFactory->get('beignet.settings');
            $number = $config->get('default_number');
        }

        return [
            '#type' => 'markup',
            '#markup' => sprintf('NOM %s beignets', $number),
        ];
    }
}
