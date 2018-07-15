<?php

use Illuminate\Database\Seeder;

use App\Area;
use App\Donator;
use App\Receiver;
use App\User;

class BasicSeeder extends Seeder
{
    public function run()
    {
      $d1 = Donator::create([
        'uid' => 'sylviot',
        'name' => 'Sylvio Tavares',
        'email' => 'sylvio.tavares@hotmail.com',
        'password' => bcrypt('123'),
      ]);
      User::create([
        'name' => 'SylvioT',
        'email' => 'sylviot@email.com',
        'reference_type' => 'donator',
        'reference_id' => $d1->id,
        'password' => bcrypt('321321'),
      ]);

      $r1 = Receiver::create([
        'cnpj' => '00000000000',
        'name' => 'Casa Família Rosetta',
        'email' => 'casarosetta@email.com',
        'password' => bcrypt('123456'),
      ]);
      User::create([
        'name' => 'ONG',
        'email' => 'ong@email.com',
        'reference_type' => 'receiver',
        'reference_id' => $r1->id,
        'password' => bcrypt('321321'),
      ]);
      $r2 = Receiver::create([
        'cnpj' => '00000000001',
        'name' => 'APAE',
        'email' => 'apae@email.com',
        'password' => bcrypt('123456'),
      ]);
      $r3 = Receiver::create([
        'cnpj' => '00000000003',
        'name' => 'CAPS AD',
        'email' => 'capsad@email.com',
        'password' => bcrypt('123456'),
      ]);
      $r4 = Receiver::create([
        'cnpj' => '00000000004',
        'name' => 'CAPS MADEIRA MAMORÉ',
        'email' => 'capsmadeiramamore@email.com',
        'password' => bcrypt('123456'),
      ]);
      $r5 = Receiver::create([
        'cnpj' => '00000000005',
        'name' => 'HOSPITAL SANTA MARCELINA DE RONDÔNIA',
        'email' => 'santamarcelina@email.com',
        'password' => bcrypt('123456'),
      ]);

      $r6 = Receiver::create([
        'cnpj' => '00000000009',
        'name' => 'ASSOCIAÇÃO BENEFICENTE CENTRO OESTE NORTE',
        'email' => 'abcon@email.com',
        'password' => bcrypt('123456'),
      ]);

      Area::create(['name' => 'Roupa']);
      Area::create(['name' => 'Brinquedo']);
      Area::create(['name' => 'Calçado']);
      Area::create(['name' => 'Higiene']);


      $p1 = $r1->Points()->create([
        'code' => 'code',
        'description' => 'Ponto de coleta',
        'latitude' => '-8.771606',
        'longitude' => '-63.8994093',
      ]);
      $p1->Areas()->sync(Area::whereIn('id', [1,2])->get());

      $p2 = $r2->Points()->create([
        'code' => 'code',
        'description' => 'Ponto de coleta',
        'latitude' => '-8.7508461',
        'longitude' => '-63.8574388',
      ]);
      $p2->Areas()->sync(Area::whereIn('id', [1,3])->get());

      $p3 = $r3->Points()->create([
        'code' => 'code1',
        'description' => 'Meu ponto 2',
        'latitude' => '-8.750798',
        'longitude' => '-63.8727598',
      ]);
      $p3->Areas()->sync(Area::whereIn('id', [1,4])->get());

      $p4 = $r4->Points()->create([
        'code' => 'code1',
        'description' => 'Meu ponto 2',
        'latitude' => '-8.7499826',
        'longitude' => '-63.9071714',
      ]);
      $p4->Areas()->sync(Area::whereIn('id', [2,3])->get());

      $p5 = $r5->Points()->create([
        'code' => 'code1',
        'description' => 'Meu ponto 2',
        'latitude' => '-8.7902888',
        'longitude' => '-63.7376331',
      ]);
      $p5->Areas()->sync(Area::pluck('id')->all());

      $p6 = $r6->Points()->create([
        'code' => 'code1',
        'description' => 'Meu ponto 2',
        'latitude' => '-8.7902888',
        'longitude' => '-63.7376331',
      ]);
      $p6->Areas()->sync(Area::pluck('id')->all());
    }
}
