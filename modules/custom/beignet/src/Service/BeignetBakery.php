<?php

namespace Drupal\beignet\Service;

use Drupal\Core\Config\ConfigFactoryInterface;

class BeignetBakery
{
    private $configFactory;

    public function __construct(ConfigFactoryInterface $configFactory)
    {
        $this->configFactory = $configFactory;
    }

    public function bakeBeignets($number)
    {
        if ($number === null) {
            $config = $this->configFactory->get('beignet.settings');
            $number = $config->get('default_number');
        }

        $flavors = ['chocolate', 'plain', 'strawberry-filled'];
        $beignets = [];
        for ($i = 0; $i <= $number; $i++) {
            $flavorKey = array_rand($flavors);
            $flavor = $flavors[$flavorKey];

            $beignets[] = $flavor;
        }

        return $beignets;
    }
}
