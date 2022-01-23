<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\CustomerMaterial;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerMaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerMaterial::class;
 
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'material_id' => Material::all()->random()->id,
        ];
    }
}
