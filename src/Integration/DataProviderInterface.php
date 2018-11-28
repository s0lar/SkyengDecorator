<?php

namespace src\Integration;

interface DataProviderInterface
{
    public function getResponseExternalService(array $request);
}
