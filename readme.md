# Functional options in PHP experiment

https://commandcenter.blogspot.com/2014/01/self-referential-functions-and-design.html

## Example

```php
use Playground\FooClient;

// Create a new FooClient with delay and timeout
$client = new FooClient(
    FooClient::withDelay(60),
    FooClient::withTimeout(60)
);

// Temporarily decrease delay
$revertDelay = $client->applyOption(
    FooClient::withDelay(10)
);

// Do stuff using new delay
// $client->....

// Revert to previous delay
$client->applyOption($revertDelay);
```
