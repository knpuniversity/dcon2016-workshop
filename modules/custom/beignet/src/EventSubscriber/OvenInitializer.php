<?php

namespace Drupal\beignet\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OvenInitializer implements EventSubscriberInterface {
  public function onKernelRequest()
  {
    drupal_set_message('onKernelRequest is being called!');
  }

  static function getSubscribedEvents() {
    $events['kernel.request'] = ['onKernelRequest'];

    return $events;
  }
}
