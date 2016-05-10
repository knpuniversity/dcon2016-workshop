<?php

namespace Drupal\beignet\Service;

use Drupal\Core\Config\ConfigFactoryInterface;

class BeignetBakery
{
    private $configFactory;

    private $ovenStarted = false;

    public function __construct(ConfigFactoryInterface $configFactory)
    {
        $this->configFactory = $configFactory;
    }

    public function bakeBeignets($number)
    {
        if (!$this->ovenStarted) {
            throw new \Exception('You cannot bake beignets unless the oven is on!');
        }

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

    public function turnOnOven()
    {
        $this->ovenStarted = true;
    }
}
