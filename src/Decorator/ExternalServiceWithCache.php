<?php

namespace src\Decorator;

use src\Decorator\DecoratorManager;

class ExternalServiceWithCache extends DecoratorManager
{
    /**
     * Декорируем метод получения ответа от стороннего сервиса
     *
     * @param array $input
     * @return array
     */
    public function getResponseExternalService(array $input)
    {
        try {
            $cacheKey = $this->getCacheKey($input);
            $cacheItem = $this->cache->getItem($cacheKey);
            if ($cacheItem->isHit()) {
                return $cacheItem->get();
            }

            //  Получаем ответ от стороннего сервиса
            $result = $this->dataProvider->getResponseExternalService($input);

            $cacheItem
                ->set($result)
                ->expiresAt(
                    (new \DateTime())->modify('+1 day')
                );
            return $result;
        } catch (\Exception $e) {
            $this->logger->critical('Error');
        }
        return [];
    }

    /**
     * @param array $input
     * @return string
     */
    public function getCacheKey(array $input)
    {
        return json_encode($input);
    }
}
