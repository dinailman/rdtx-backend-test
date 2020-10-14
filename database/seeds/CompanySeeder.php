<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $companies = [];
        // $faker = Faker\Factory::create();   
        // for($i=0;$i<15;$i++){
        //     $data[$i] = [
        //         'name' => $faker,
        //     ];
        // }
        // DB::table('companies')->insert($data);
        $companies = factory(\App\Company::class, 15)->create();
    }
}
