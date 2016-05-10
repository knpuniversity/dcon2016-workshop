<?php

namespace Drupal\beignet\Controller;

use Symfony\Component\HttpFoundation\Response;

class BeignetController
{
    public function eatBeignets($number)
    {
        return new Response(sprintf('NOM %s beignets', $number));
    }
}
