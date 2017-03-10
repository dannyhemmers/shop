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

       DB::table('categories')->insert([
          'name' => 'other',
       ]);

       DB::table('articles')->insert([
          'category' => 1,
          'name' => 'Race Copter ZMR 250',
          'image' => 'zmr250.jpg',
          'description' => 'ZMR 250',
          'description_long' => 'ZMR 250 mit folgenden Spezifikationen:',
          'price' => 225,
       ]);

       DB::table('articles')->insert([
          'category' => 1,
          'name' => 'Tarot Drohne',
          'image' => 'DrohneFull.jpg',
          'description' => 'Tarot Drohne',
          'description_long' => 'Tarot Drohne mit folgenden Spezifikationen:',
          'price' => 790,
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

   DB::table('articles')->insert([
      'category' => 7,
      'name' => 'Mini Stromverteilerplatine',
      'image' => 'Stromverteilerplatine5Vu12VBEC.JPG',
      'description' => '5V BEC und 12V BEC Ausgang',
      'description_long' => '5V BEC und 12V BEC<br>LED Schalter',
      'weight' => 6,
      'width' => 36,
      'length' => 36,
      'height' => 1.6,
      'price' => 10,
  ]);

  DB::table('articles')->insert([
     'category' => 6,
     'name' => 'OpenPilot CC3D Flugcontroller',
     'image' => 'FlugcontrollerCC3D.JPG',
     'description' => 'CC3D Flugsteuerung',
     'description_long' => 'CC3D Flugsteuerung für OPENPILOT oder CLEANFLIGHT Software',
     'price' => 20,
 ]);

 DB::table('articles')->insert([
    'category' => 5,
    'name' => 'Propeller 6 x 4.5“R (4 Stück)',
    'image' => 'Propeller6x4.5ZollR.jpg',
    'description' => 'Durchmesser: 6 Zoll (15,24cm)',
    'description_long' => 'Durchmesser: 6 Zoll (15,24cm)<br>Steigung: 4.5 Zoll (11,43cm)Bohrung: 6mm (inkl. Adapter für 3mm, 4mm, 5mm Wellendurchmesser)<br>Material: Carbon-Verstärktes Nylon<br>Farbe: Schwarz<br>Inhalt: 4 Stück- Rechtsdrehend (R)',
    'weight' => 5,
    'price' => 20,
]);

DB::table('articles')->insert([
   'category' => 8,
   'name' => 'OrangeRX R615X Empfänger DSM2/DSMX 6 Kanal 2,4GH',
   'image' => 'EmpfaengerR615X6Kanal.jpg',
   'description' => 'Reichweite: 500-800 Meter',
   'description_long' => 'Reichweite: 500-800 Meter<br>Spannungsbereich: 3,7V - 9,6V',
   'weight' => 9.8,
   'width' => 43,
   'length' => 22,
   'height' => 13,
   'price' => 20,
]);

DB::table('articles')->insert([
   'category' => 8,
   'name' => 'Montageset (4 Stück)',
   'image' => 'Kabelset.jpg',
   'description' => '4 Stück Servokabel',
   'description_long' => '4 Stück Servokabel<br>Diverse Stromkabel<br>Diverse Stecker<br>Schrumpfschläuche<br>Kabelbinder',
   'price' => 15,
]);

DB::table('articles')->insert([
   'category' => 2,
   'name' => 'Frame Tarot Iron Man 650',
   'image' => 'FrameTarotIronMan650.jpg',
   'description' => '650 mm Motoren abstand',
   'description_long' => '650 mm Motoren abstand<br>Propeller: 12-15 Zoll<br>Durchmesser 650mm<br>3K Carbon<br>16mm 3K Carbon Ausleger',
   'weight' => 476,
   'price' => 120,
]);

DB::table('articles')->insert([
   'category' => 4,
   'name' => 'Tarot 4008 MT 3300kv TL2955 Brushless Multicopter Motor (4 Stück)',
   'image' => 'TarotBrushlesMotor.jpg',
   'description' => '(4er Pack) KV: 3300',
   'description_long' => 'KV: 3300<br>Durchmesser: 44,5 mm<br>Durchmesser Propeller Schaft: 12mm',
   'weight' => 85,
   'length' => 19,
   'price' => 240,
]);

DB::table('articles')->insert([
   'category' => 7,
   'name' => 'Tarot Stromverteilerplatine 6x',
   'image' => 'TarotVerteilerplatine.jpg',
   'description' => '(4er Pack) KV: 3300',
   'description_long' => 'Eingangsspannung: 2-6S',
   'weight' => 12,
   'width' => 50,
   'length' => 50,
   'height' => 11.5,
   'price' => 15,
]);

DB::table('articles')->insert([
   'category' => 6,
   'name' => 'Tarot ZYX-M Flight Controller – Multicopter Steuerung mit GPS – Set',
   'image' => 'TarotZYX-MFligthController.jpg',
   'description' => 'Flight Controller ZYX-M mit GPS Kompass Modul',
   'description_long' => 'Flight Controller ZYX-M<br>GPS Kompass Modul<br>Power Modul zur Spannungsversorgung<br>Signal LED<br>USB-Modul zum Anschluss am PC (inkl. USB Kabel)<br>8x Patchkabel zur Verbindung mit dem Empfänger<br>Klebepads<br><br>Daten Flight Controller<br>	Größe: 55mm x 40mm x 15mm<br>	Gewicht 46 g<br>Spannung 4,8 – 5,5V<br><br>Daten GPS Modul:<br>Größe: 50mm x 50mm x 15mm<br>Gewicht: 27g<br>',
   'price' => 150,
]);

DB::table('articles')->insert([
   'category' => 5,
   'name' => 'Tarot A14EVO 15 Zoll CF Klappluftschrauben CW/CCW',
   'image' => 'TarotPropeller15Zoll.png',
   'description' => 'Durchmesser: 15 Zoll',
   'description_long' => 'Durchmesser: 15 Zoll<br>Steigung: 4.5 Zoll<br>Bohrung:4mm Mittelbohrung (Befestigungslöcher je 3mm)<br>Material: Carbon Fiber<br>Farbe: Schwarz<br>Inhalt: 4 Stück- Rechtsdrehend (R)',
   'weight' => 25,
   'price' => 65,
]);

DB::table('articles')->insert([
   'category' => 6,
   'name' => '(4er Pack) EMAX 12 A Simon K Regler für Multicopter (4 Stück)',
   'image' => 'Regler-EMax30Ampere36S.jpg',
   'description' => 'Strom: 12A',
   'description_long' => 'Strom: 12A<br>Burst-Strom: 15A<br>Batterie: 1-3S LiPo',
   'weight' => 8,
   'width' => 22,
   'length' => 17,
   'height' => 7,
   'price' => 50,
]);

DB::table('articles')->insert([
   'category' => 8,
   'name' => 'Tarot Montageset',
   'image' => 'TarotAnschlusskabelset.jpg',
   'description' => 'Kabelset',
   'description_long' => '4 Stück Servokabel<br>Diverse Stromkabel<br>Diverse Stecker<br>Schrumpfschläuche<br>Kabelbinder<br>Div. Kleinmaterial',
   'price' => 50,
]);

DB::table('articles')->insert([
   'category' => 2,
   'name' => 'Elektrisches Landegestell',
   'image' => 'Landegestell.jpg',
   'description' => 'Ansteuerung: TL8X002 Controller',
   'description_long' => 'Ansteuerung: TL8X002 Controller<br>Betriebsspannung: 3S-6S (max. 25.2V)',
   'price' => 80,
]);


    }
}
