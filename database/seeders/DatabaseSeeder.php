<?php

namespace Database\Seeders;

use App\Models\Listing;
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
          \App\Models\User::factory(5)->create();

          Listing::factory(6)->create();

      /*    Listing::create([
              'title'=>'Laravel Senior Developer',
              'tags'=>'laravel, Javascript',
              'company'=>'Acme Corp',
              'location'=>'Boston, MA',
              'email'=>'email1@email.com',
              'website'=>'https://www.acme.com',
              'description'=>'Lorem ipsum dolor sit amet asd asdkl asldka'

          ]);

          Listing::create([
              'title'=>'Full Stack Developer',
              'tags'=>'laravel, backend,api',
              'company'=>'Stark Ind',
              'location'=>'New York,NY',
              'email'=>'email2@email.com',
              'website'=>'https://www.starkind.com',
              'description'=>'Lorem ipsum dolor sit amet asd asdkl asldka asda asd asd vdfv vfgb'
          ]);*/
    }
}
