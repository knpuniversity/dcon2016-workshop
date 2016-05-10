<?php

namespace Drupal\beignet\Controller;

use Drupal\beignet\Service\BeignetBakery;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BeignetController implements ContainerInjectionInterface
{
    private $beignetBakery;

    public function __construct(BeignetBakery $beignetBakery)
    {
        $this->beignetBakery = $beignetBakery;
    }

    public static function create(ContainerInterface $container)
    {
        return new self($container->get('beignet.beignet_bakery'));
    }

    public function eatBeignets($number)
    {
        $beignets = $this->beignetBakery->bakeBeignets($number);

        return [
            '#type' => 'markup',
            '#markup' => 'NOM the following beignets: '.implode(', ', $beignets),
        ];
    }
}
