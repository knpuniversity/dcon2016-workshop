<?php

namespace Drupal\beignet\EventSubscriber;

use Drupal\beignet\Service\BeignetBakery;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OvenInitializer implements EventSubscriberInterface {
  private $bakery;

  public function __construct(BeignetBakery $bakery)
  {
    $this->bakery = $bakery;
  }

  public function onKernelRequest()
  {
    $this->bakery->turnOnOven();
  }

  static function getSubscribedEvents() {
    $events['kernel.request'] = ['onKernelRequest'];

    return $events;
  }
}
