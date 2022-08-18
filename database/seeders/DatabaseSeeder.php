<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Card;
use App\Models\User;
use App\Models\Device;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            RolesTableSeeder::class,
            // UserTableSeeder::class,
            RoleUserTableSeeder::class,
            PermissionRoleTableSeeder::class,
        ]);

        User::factory()
            ->has(Device::factory()->count(4))
            ->has(Card::factory()->count(4))
            ->count(10)
            ->create();

        /*
            User::factory()
                ->count(10)
                ->has(
                    Device::factory()
                    ->count(4)
                )
                ->has(
                    Card::factory()
                    ->count(4)
                )
                ->hasAttached(
                    Role::factory()->count(5),
                    RoleUser::factory
                    ->hasAttached(
                        permission::factory()->count(2),
                        PermissionRole::factory()
                    )
                )
                ->create();
        */

    }
}
