<?php

namespace Drupal\beignet\EventSubscriber;

use Drupal\beignet\Service\BeignetBakery;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OvenInitializer implements EventSubscriberInterface {
  private $bakery;
  private $ovenStartedAt;
  private $loggerChannelFactory;

  public function __construct(BeignetBakery $bakery, LoggerChannelFactoryInterface $loggerChannelFactory)
  {
    $this->bakery = $bakery;
    $this->loggerChannelFactory = $loggerChannelFactory;
  }

  public function onKernelRequest()
  {
    $this->bakery->turnOnOven();
    $this->ovenStartedAt = microtime(true);
  }

  public function onKernelResponse()
  {
    $this->bakery->turnOffOven();
    $duration = microtime(true) - $this->ovenStartedAt;

    $this->loggerChannelFactory
      ->get('database')
      ->info(sprintf('Oven was on for %s seconds', $duration));
  }

  static function getSubscribedEvents() {
    $events['kernel.request'] = ['onKernelRequest'];
    $events['kernel.response'] = ['onKernelResponse'];

    return $events;
  }
}
