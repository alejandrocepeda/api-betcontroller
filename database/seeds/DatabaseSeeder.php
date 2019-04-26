<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {           
        
        $this->call(BetSeeder::class);
        $this->call(MarketSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(LeagueSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(BookmakerSeeder::class);
        $this->call(UserStatusesSeeder::class);
        $this->call(EventStatusesSeeder::class);
        $this->call(BoomakerUserSeeder::class);
        
        $this->Roles();
    }

    public function Roles(){
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        

        //Permission list
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.show']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.destroy']);

        //User Default
        User::truncate();

        $user = User::create([
            'id'        => 1,
            'name'      => 'Alejandro Cepeda',
            'email'     => 'alejandro@gmail.com',
            'password'  => bcrypt('123456')
        ]);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'events.index',
            'events.edit',
            'events.show',
            'events.create',
            'events.destroy'
        ]);
        
        $user = User::find(1); 
        $user->assignRole('Admin');
    }
}
