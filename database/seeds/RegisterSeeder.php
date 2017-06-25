<?php

use Illuminate\Database\Seeder;
use App\Register;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($appendData)
    {
        foreach($appendData as $register){
            
            Register::create([
                    'number'=>$register['nomer'],
                    'FIO'=>$register['name'],
                    'sex'=>$register['sex'],
                    'birtdate'=>$register['age'],
                    'region'=>$register['region'],
                    'city'=>$register['sity'],
                    'code'=>$register['kod'],
                    'diagnose'=>$register['diagnoz'],
                    'famaly'=>$register['family'],
                    'national'=>$register['national'],
                    'social'=>$register['social'],
                    'ifa'=>$register['ifa'],
                    'grantdate'=>$register['date'],

                ]);
                

            /*$addUser->office()->create([

                    'fullname' => $newUser->name,
                    'geolocation' => 'XX"XX"XX"',
                    'image' => $newUser->name . '.png',
                    'phone' => $newUser->contacts,
                ]);

            $addUser->save();*/
        }
    }
}
