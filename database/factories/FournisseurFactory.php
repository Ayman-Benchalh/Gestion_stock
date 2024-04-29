<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fournisseur>
 */
class FournisseurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_Complet' => fake()->userName(),
            'Adresse' => fake()->address(),
            'email' => fake()->unique()->email(),
            'telephone' => fake()->phoneNumber(),
            'Montant' => 0,
        ];
    }
}
