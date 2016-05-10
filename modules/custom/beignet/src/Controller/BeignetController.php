<?php

namespace Drupal\beignet\Controller;

use Drupal\beignet\Service\BeignetBakery;
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
        $bakery = new BeignetBakery($this->configFactory);
        $beignets = $bakery->bakeBeignets($number);

        return [
            '#type' => 'markup',
            '#markup' => 'NOM the following beignets: '.implode(', ', $beignets),
        ];
    }
}
