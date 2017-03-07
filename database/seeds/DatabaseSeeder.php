<?php

use Illuminate\Database\Seeder;

//Befüllen der Datenbank mit den Shop-Daten
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'name' => 'admin',
           'email' => 'admin@confidro.com',
           'password' => bcrypt('confidroadmin'),
       ]);

       DB::table('users')->insert([
           'name' => 'testshopper',
           'email' => 'testshopper@web.de',
           'password' => bcrypt('testshopper'),
       ]);

       DB::table('categories')->insert([
          'name' => 'complete',
       ]);

       DB::table('categories')->insert([
          'name' => 'frames',
       ]);

       DB::table('categories')->insert([
          'name' => 'arms',
       ]);

       DB::table('categories')->insert([
          'name' => 'motors',
       ]);

       DB::table('categories')->insert([
          'name' => 'props',
       ]);

       DB::table('categories')->insert([
          'name' => 'controllers',
       ]);

       DB::table('categories')->insert([
          'name' => 'power',
       ]);

       DB::table('articles')->insert([
          'category' => 2,
          'name' => 'Frame ZMR 250 Carbon',
          'image' => 'FrameZMR250Carbon.jpg',
          'description' => 'Frame mit 50mm Motorenabstand',
          'description_long' => '50 mm Motoren abstand<br>Propeller: 5-6 Zoll<br>1,5mm 3K Carbon<br>3mm 3K Carbon Ausleger',
          'weight' => 139,
          'width' => 180,
          'length' => 230,
          'height' => 60,
          'price' => 30,
      ]);

      DB::table('articles')->insert([
         'category' => 4,
         'name' => 'EMAX RS2205 2300 kv Motor (4 Stück)',
         'image' => 'EMAXRS22052300kvMotoren.JPG',
         'description' => 'KV: 2300',
         'description_long' => '4er Pack<br>KV: 2300<br>Durchmesser Propeller Schaft: M5',
         'weight' => 28.8,
         'length' => 31.7,
         'price' => 60,
     ]);

     DB::table('articles')->insert([
        'category' => 6,
        'name' => 'Flugregler ESC 2-4S Oneshot 20A (4 Stück)',
        'image' => 'Flugregler20AESC2-4SOneshot125.jpg',
        'description' => 'Strom: 20A',
        'description_long' => '4er Pack<br>Strom: 20A<br>Burst-Strom: 30A<br>Bootloader: BLheli<br>FETS: Alle N<br>Firmware: BLheli 14, OneShot bereit<br>Batterie: 2-4S LiPo<br>',
        'weight' => 7,
        'width' => 23,
        'length' => 13,
        'height' => 3,
        'price' => 40,
    ]);

    DB::table('articles')->insert([
       'category' => 7,
       'name' => 'UBEC 5V 3A Stromversorgung für Flugregler',
       'image' => 'UBEC5V3A.JPG',
       'description' => 'Eingang: 5-23V 2-5S LiPo',
       'description_long' => 'Eingang: 5-23V 2-5S LiPo<br>Ausgang:5V 3A',
       'weight' => 11.5,
       'width' => 42,
       'length' => 24,
       'height' => 11,
       'price' => 10,
   ]);



    }
}
