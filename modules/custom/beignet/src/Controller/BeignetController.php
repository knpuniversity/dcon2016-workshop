<?php

namespace Drupal\beignet\Controller;

use Symfony\Component\HttpFoundation\Response;

class BeignetController
{
    public function eatBeignets()
    {
        return new Response('NOM');
    }
}
