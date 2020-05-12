Api client for marketplace [kupivip.ru](https://kupivip.ru). 


Simple usage
```
$client = \KupiVipApi\ApiClient::create(['token' => $token]);
$result = $client->getProfile(['vendorCode' => $vendorCode]);

// or if you want to remove IDE warnings
$command = $client->getCommand('getProfile', ['vendorCode' => $vendorCode]);
$result = $client->execute($command);
```

Also lib has another client for new integration api
```
$client = \KupiVipApi\IntegrationApiClient::create(['token' => $token]);
$result = $client->getOrder(['id' => '12345678']);
```

All available methods are described in [service.json](https://github.com/positron48/kupivip-php-client/blob/master/service.json)

Read more about usage of guzzle service client [here](https://guzzle3.readthedocs.io/webservice-client/guzzle-service-descriptions.html#example-service-description).
