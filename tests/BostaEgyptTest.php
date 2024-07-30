<?php

namespace amribrahim34\BostaEgypt\Tests;

use PHPUnit\Framework\TestCase;
use amribrahim34\BostaEgypt\BostaEgypt;
use amribrahim34\BostaEgypt\Builders\DeliverySearchBuilder;
use amribrahim34\BostaEgypt\Builders\UpdateDeliveryBuilder;

class BostaEgyptTest extends TestCase
{
    protected $bostaEgypt;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bostaEgypt = new BostaEgypt('test_api_key');
    }

    public function testPricingCalculateShipment()
    {
        $params = ['weight' => 5, 'fromCity' => 'Cairo', 'toCity' => 'Alexandria'];
        $response = $this->bostaEgypt->pricing()->calculateShipment($params);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('price', $response);
        $this->assertIsNumeric($response['price']);
    }

    public function testDeliveriesCreate()
    {
        $data = [
            'type' => 'PICKUP',
            'specs' => ['packageType' => 'Parcel', 'size' => 'SMALL'],
            'receiver' => [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'phone' => '1234567890',
                'email' => 'john@example.com'
            ],
            'dropOffAddress' => [
                'city' => 'Cairo',
                'zone' => 'Maadi',
                'street' => '123 Main St'
            ]
        ];
        $response = $this->bostaEgypt->deliveries()->create($data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('trackingNumber', $response);
    }

    public function testDeliveriesSearchDeliveries()
    {
        $builder = new DeliverySearchBuilder();
        $builder->setTrackingNumber('BOSTA123456')
            ->setDateFrom('2023-01-01')
            ->setDateTo('2023-12-31');

        $response = $this->bostaEgypt->deliveries()->searchDeliveries($builder);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('deliveries', $response);
        $this->assertIsArray($response['deliveries']);
    }

    public function testDeliveriesTrack()
    {
        $trackingNumber = 'BOSTA123456';
        $response = $this->bostaEgypt->deliveries()->track($trackingNumber);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('status', $response);
        $this->assertArrayHasKey('currentTrackingState', $response);
    }

    public function testDeliveriesUpdateDelivery()
    {
        $trackingNumber = 'BOSTA123456';
        $builder = new UpdateDeliveryBuilder();
        $builder->setSpecs(['packageType' => 'Document', 'size' => 'MEDIUM']);

        $response = $this->bostaEgypt->deliveries()->updateDelivery($trackingNumber, $builder);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
    }

    public function testDraftOrdersCreateDraftOrder()
    {
        $data = [
            'type' => 'PICKUP',
            'specs' => ['packageType' => 'Parcel', 'size' => 'SMALL'],
            'receiver' => [
                'firstName' => 'Jane',
                'lastName' => 'Smith',
                'phone' => '0987654321',
                'email' => 'jane@example.com'
            ],
            'dropOffAddress' => [
                'city' => 'Alexandria',
                'zone' => 'Montazah',
                'street' => '456 Side St'
            ]
        ];
        $response = $this->bostaEgypt->draftOrders()->createDraftOrder($data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
    }

    public function testDraftOrdersGetAll()
    {
        $response = $this->bostaEgypt->draftOrders()->getAll();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('draftOrders', $response);
        $this->assertIsArray($response['draftOrders']);
    }

    public function testDraftOrdersGetById()
    {
        $id = 'DRAFT123';
        $response = $this->bostaEgypt->draftOrders()->getById($id);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertEquals($id, $response['id']);
    }

    public function testDraftOrdersUpdate()
    {
        $id = 'DRAFT123';
        $data = ['specs' => ['packageType' => 'Document', 'size' => 'LARGE']];
        $response = $this->bostaEgypt->draftOrders()->update($id, $data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
    }

    public function testDraftOrdersDelete()
    {
        $id = 'DRAFT123';
        $response = $this->bostaEgypt->draftOrders()->delete($id);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
    }

    public function testNotificationsGetAll()
    {
        $response = $this->bostaEgypt->notifications()->getAll();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('notifications', $response);
        $this->assertIsArray($response['notifications']);
    }

    public function testNotificationsGetCount()
    {
        $response = $this->bostaEgypt->notifications()->getCount();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('count', $response);
        $this->assertIsInt($response['count']);
    }

    public function testPickupsCreate()
    {
        $data = [
            'scheduledDate' => '2023-07-15',
            'scheduledTimeSlot' => '09:00-13:00',
            'contactPerson' => [
                'name' => 'Alice Brown',
                'phone' => '1122334455'
            ],
            'pickupAddress' => [
                'city' => 'Cairo',
                'zone' => 'Nasr City',
                'street' => '789 Pickup St'
            ]
        ];
        $response = $this->bostaEgypt->pickups()->create($data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
    }

    public function testPickupsGetAvailableDates()
    {
        $response = $this->bostaEgypt->pickups()->getAvailableDates();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('availableDates', $response);
        $this->assertIsArray($response['availableDates']);
    }

    public function testPickupsGetById()
    {
        $id = 'PICKUP123';
        $response = $this->bostaEgypt->pickups()->getById($id);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertEquals($id, $response['id']);
    }

    public function testPickupsUpdatePickup()
    {
        $id = 'PICKUP123';
        $data = [
            'scheduledDate' => '2023-07-16',
            'scheduledTimeSlot' => '14:00-18:00'
        ];
        $response = $this->bostaEgypt->pickups()->updatePickup($id, $data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
    }
}
