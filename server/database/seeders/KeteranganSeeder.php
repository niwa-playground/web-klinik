<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', '2022-10-18 00:00:00');
        $this->command->info("Seeding Keterangan");
        $this->command->getOutput()->progressStart(20);
        for ($i = 0; $i < 20; $i++) {
            $d['created_at'] = $date->format('Y-m-d H:i:s');
            $d['updated_at'] = $date->format('Y-m-d H:i:s');
            DB::table('keterangan_pemeriksaan')->insert([
                'pemeriksaan_id' => rand(1, 20),
                'bidang_id' => rand(1, 8),
                'parameter_id' => rand(1, 5),
                'metode_id' => rand(1, 17),
                'hasil' => $faker->sentence(),
                'kesan' => $faker->sentence(),
                'catatan' => $faker->sentence()
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
