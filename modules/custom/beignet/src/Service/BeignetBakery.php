<?php

namespace Drupal\beignet\Service;

class BeignetBakery
{
    public function bakeBeignets($number)
    {
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
