<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           
        ]);
         $user->assignRole('admin','writer');

         $testuser=User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           
        ]);
        $testuser->assignRole('user');


        $permission = permission::create(['name'=> 'create access']);
        $user->givepermissionto($permission);
    }

}
