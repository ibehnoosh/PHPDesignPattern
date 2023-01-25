<?php
abstract class CarFactory {
    abstract public function createCar(): Car;
    abstract public function createTruck(): Truck;
}

abstract class Car {
    abstract public function drive();
}

abstract class Truck {
    abstract public function load();
}

class ElectricCar extends Car {
    public function drive() {
        // code to drive electric car
    }
}
class PetrolCar extends Car {
    public function drive() {
        // code to drive petrol car
    }
}
class ElectricTruck extends Truck {
    public function load() {
        // code to load electric truck
    }
}
class PetrolTruck extends Truck {
    public function load() {
        // code to load petrol truck
    }
}

class ElectricCarFactory extends CarFactory {
    public function createCar(): ElectricCar {
        return new ElectricCar();
    }
    public function createTruck(): ElectricTruck {
        return new ElectricTruck();
    }
}
class PetrolCarFactory extends CarFactory {
    public function createCar(): PetrolCar {
        return new PetrolCar();
    }
    public function createTruck(): PetrolTruck {
        return new PetrolTruck();
    }
}

$electricCarFactory = new ElectricCarFactory();
$electricCar = $electricCarFactory->createCar();
$electricCar->drive();

$petrolCarFactory = new PetrolCarFactory();
$petrolCar = $petrolCarFactory->createCar();
$petrolCar->drive();