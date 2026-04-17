<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'      => $this->faker->unique()->userName(),
            'password_hash' => Hash::make('password123'),   // password default untuk testing
            'nama_lengkap'  => $this->faker->name(),
            'role'          => $this->faker->randomElement(['admin', 'manager', 'kasir', 'gudang']),
            'is_active'     => true,
        ];
    }
}
