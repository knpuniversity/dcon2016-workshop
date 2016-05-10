<?php

namespace Drupal\beignet\Controller;

class BeignetController
{
    public function eatBeignets($number)
    {
        return [
            '#type' => 'markup',
            '#markup' => sprintf('NOM %s beignets', $number),
        ];
    }
}
