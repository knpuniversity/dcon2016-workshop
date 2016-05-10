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

  public function onKernelResponse()
  {
    $this->bakery->turnOffOven();
  }

  static function getSubscribedEvents() {
    $events['kernel.request'] = ['onKernelRequest'];
    $events['kernel.response'] = ['onKernelResponse'];

    return $events;
  }
}
