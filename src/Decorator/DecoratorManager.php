<?php

namespace src\Decorator;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use src\Integration\DataProviderInterface;

abstract class DecoratorManager implements DataProviderInterface
{
    protected $dataProvider;
    protected $cache;
    protected $logger;

    /**
     * @param DataProviderInterface $dataProvider
     * @param CacheItemPoolInterface $cache
     * @param LoggerInterface $logger
     */
    public function __construct(DataProviderInterface $dataProvider, CacheItemPoolInterface $cache, LoggerInterface $logger)
    {
        $this->$dataProvider = $dataProvider;
        $this->cache = $cache;
        $this->logger = $logger;
    }
}
