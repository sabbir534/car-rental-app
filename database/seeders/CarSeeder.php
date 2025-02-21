<?php
namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cars = [
            [
                'name'             => 'Civic LX',
                'brand'            => 'Honda',
                'model'            => 'Civic',
                'year'             => 2020,
                'car_type'         => 'Sedan',
                'daily_rent_price' => 45.50,
                'availability'     => true,
                'image'            => null,
            ],
            [
                'name'             => 'Accord EX',
                'brand'            => 'Honda',
                'model'            => 'Accord',
                'year'             => 2021,
                'car_type'         => 'Sedan',
                'daily_rent_price' => 60.00,
                'availability'     => true,
                'image'            => null,
            ],
            [
                'name'             => 'Model 3',
                'brand'            => 'Tesla',
                'model'            => 'Model 3',
                'year'             => 2019,
                'car_type'         => 'Sedan',
                'daily_rent_price' => 120.00,
                'availability'     => false,
                'image'            => null,
            ],
            [
                'name'             => 'Rav4',
                'brand'            => 'Toyota',
                'model'            => 'Rav4',
                'year'             => 2021,
                'car_type'         => 'SUV',
                'daily_rent_price' => 75.99,
                'availability'     => true,
                'image'            => null,
            ],
            [
                'name'             => 'Mustang GT',
                'brand'            => 'Ford',
                'model'            => 'Mustang',
                'year'             => 2022,
                'car_type'         => 'Coupe',
                'daily_rent_price' => 150.00,
                'availability'     => true,
                'image'            => null,
            ],
            [
                'name'             => 'Camry SE',
                'brand'            => 'Toyota',
                'model'            => 'Camry',
                'year'             => 2020,
                'car_type'         => 'Sedan',
                'daily_rent_price' => 50.00,
                'availability'     => true,
                'image'            => null,
            ],
            [
                'name'             => 'X5',
                'brand'            => 'BMW',
                'model'            => 'X5',
                'year'             => 2018,
                'car_type'         => 'SUV',
                'daily_rent_price' => 130.00,
                'availability'     => false,
                'image'            => null,
            ],
            [
                'name'             => 'Model S',
                'brand'            => 'Tesla',
                'model'            => 'Model S',
                'year'             => 2022,
                'car_type'         => 'Sedan',
                'daily_rent_price' => 200.00,
                'availability'     => true,
                'image'            => null,
            ],
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}
