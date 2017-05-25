<?php

use App\Data\CoreField;
use App\Data\CoreTable;
use App\Data\CoreTableGroup;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new User([
            'name' => 'Thomas Warlop',
            'email' => 'thomas.warlop@gmail.com',
        ]);

        $user->password = app('hash')->make('thomas');
        $user->save();


        factory(CoreTableGroup::class)->times(3)->create();
        factory(CoreTable::class)->times(10)->create();
        factory(CoreField::class)->times(100)->create();
    }
}
