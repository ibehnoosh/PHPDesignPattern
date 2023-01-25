<?php
interface CarFactory {
    public function createCar(): Car;
    public function createTruck(): Truck;
}
interface Car {/*...*/}
class Sedan implements Car {/*...*/}
class SUV implements Car {/*...*/}
interface Truck {/*...*/}
class PickupTruck implements Truck {/*...*/}
class BoxTruck implements Truck {/*...*/}

class FamilyCarFactory implements CarFactory {
    public function createCar(): Sedan {
        return new Sedan();
    }
    public function createTruck(): PickupTruck {
        return new PickupTruck();
    }
}

class LuxuryCarFactory implements CarFactory {
    public function createCar(): SUV {
        return new SUV();
    }
    public function createTruck(): BoxTruck {
        return new BoxTruck();
    }
}

$familyCarFactory = new FamilyCarFactory();
$sedan = $familyCarFactory->createCar();
$pickupTruck = $familyCarFactory->createTruck();

$luxuryCarFactory = new LuxuryCarFactory();
$suv = $luxuryCarFactory->createCar();
$boxTruck = $luxuryCarFactory->createTruck();
