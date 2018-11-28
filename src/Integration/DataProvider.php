<?php

namespace src\Integration;

use src\Integration\DataProviderInterface;

class DataProvider implements DataProviderInterface
{
    private $host;
    private $user;
    private $password;

    /**
     * @param string $host
     * @param string $user
     * @param string $password
     */
    public function __construct($host, $user, $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Returns a response from external service
     *
     * @param array $request
     * @return array
     */
    public function getResponseExternalService(array $request)
    {
        return array();
    }
}
