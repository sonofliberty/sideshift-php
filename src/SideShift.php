<?php

namespace SonOfLiberty\SideShift;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use SonOfLiberty\SideShift\Model\Facts;
use SonOfLiberty\SideShift\Model\Order;
use SonOfLiberty\SideShift\Model\Pair;
use SonOfLiberty\SideShift\Model\Quote;

class SideShift
{
    const BASE_URL = 'https://sideshift.ai/api/v1';

    private ?string $secret;
    private ClientInterface $httpClient;
    private SerializerInterface $serializer;

    public function __construct(?string $secret = null, ?ClientInterface $httpClient = null, ?SerializerInterface $serializer = null)
    {
        $this->secret = $secret;
        $this->httpClient = null !== $httpClient ? $httpClient : new Client(['timeout' => 15]);
        $this->serializer = null !== $serializer ? $serializer : SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();
        if ($this->serializer instanceof Serializer) {
            AnnotationRegistry::registerLoader('class_exists');
        }
    }

    public function facts(): Facts
    {
        $response = $this->httpClient->get(self::BASE_URL . '/facts', [
            'headers' => ['x-sideshift-secret' => $this->secret]
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Facts::class, 'json');
    }

    public function fetchPair(string $depositMethod, string $settleMethod): Pair
    {
        $response = $this->httpClient->get(self::BASE_URL . '/pairs/' . $depositMethod . '/' . $settleMethod, [
            'headers' => ['x-sideshift-secret' => $this->secret],
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Pair::class, 'json');
    }

    public function requestQuote(
        string $depositMethodId,
        string $settleMethodId,
        ?float $depositAmount = null,
        ?float $settleAmount = null,
        ?string $affiliateId = null
    ): Quote {
        $request = [
            'depositMethod' => $depositMethodId,
            'settleMethod' => $settleMethodId,
        ];

        if ($depositAmount > 0) {
            $request['depositAmount'] = (string) $depositAmount;
        } else if ($settleAmount > 0) {
            $request['settleAmount'] = (string) $settleAmount;
        }
        if (null !== $affiliateId) {
            $request['affiliateId'] = $affiliateId;
        }

        $response = $this->httpClient->post(self::BASE_URL . '/quotes', [
            'headers' => ['x-sideshift-secret' => $this->secret],
            'json' => $request
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Quote::class, 'json');
    }

    public function createVariableOrder(
        string $depositMethodId,
        string $settleMethodId,
        string $settleAddress,
        ?string $destinationTag = null,
        ?string $memo = null,
        ?string $affiliateId = null,
        ?string $refundAddress = null
    ): Order {
        $request = [
            'type' => 'variable',
            'depositMethodId' => $depositMethodId,
            'settleMethodId' => $settleMethodId,
            'settleAddress' => $settleAddress
        ];
        if (null !== $destinationTag) {
            $request['destinationTag'] = $destinationTag;
        }
        if (null !== $memo) {
            $request['memo'] = $memo;
        }
        if (null !== $affiliateId) {
            $request['affiliateId'] = $affiliateId;
        }
        if (null !== $refundAddress) {
            $request['refundAddress'] = $refundAddress;
        }

        $response = $this->httpClient->post(self::BASE_URL . '/orders', [
            'headers' => ['x-sideshift-secret' => $this->secret],
            'json' => $request
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Order::class, 'json');
    }

    public function createFixedOrder(
        string $quoteId,
        string $settleAddress,
        ?string $destinationTag = null,
        ?string $memo = null,
        ?string $affiliateId = null,
        ?string $refundAddress = null
    ): Order {
        $request = [
            'type' => 'fixed',
            'quoteId' => $quoteId,
            'settleAddress' => $settleAddress
        ];
        if (null !== $destinationTag) {
            $request['destinationTag'] = $destinationTag;
        }
        if (null !== $memo) {
            $request['memo'] = $memo;
        }
        if (null !== $affiliateId) {
            $request['affiliateId'] = $affiliateId;
        }
        if (null !== $refundAddress) {
            $request['refundAddress'] = $refundAddress;
        }

        $response = $this->httpClient->post(self::BASE_URL . '/orders', [
            'headers' => ['x-sideshift-secret' => $this->secret],
            'json' => $request
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Order::class, 'json');
    }

    public function fetchOrder(string $orderId): Order
    {
        $response = $this->httpClient->get(self::BASE_URL . '/orders/' . $orderId, [
            'headers' => ['x-sideshift-secret' => $this->secret]
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Order::class, 'json');
    }

    public function fetchBulkOrders(array $orderIds): array
    {
        $response = $this->httpClient->post(self::BASE_URL . '/bulk-orders/', [
            'headers' => ['x-sideshift-secret' => $this->secret],
            'json' => ['orderIds' => $orderIds]
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), 'array<' . Order::class . '>', 'json');
    }
}
