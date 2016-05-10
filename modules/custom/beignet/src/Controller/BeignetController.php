<?php

namespace Drupal\beignet\Controller;

use Drupal\beignet\Service\BeignetBakery;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BeignetController extends ControllerBase
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

        $this->getLogger('database')
            ->info(sprintf('Eating %s beignets', count($beignets)));

        return [
            '#type' => 'markup',
            '#markup' => 'NOM the following beignets: '.implode(', ', $beignets),
        ];
    }
}
