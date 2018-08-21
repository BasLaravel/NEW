<?php

use Illuminate\Database\Seeder;
use App\LaptopReview;

class LaptopReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($j=1; $j<97; $j++){
            for($i=0; $i<5; $i++){
            LaptopReview::create([
                'user_id' => rand(1,100),
                'laptop_id' => $j,
                'aanrader' => rand(0,1),
                'bedieningsgemak' => rand(3,5),
                'gebruiksvriendelijkheid' => rand(3,5),
                'snelheid' => rand(3,5),
                'mogelijkheid' => rand(3,5),
                'positieve_feedback_1' => 'Goed product',
                'positieve_feedback_2' => 'veel waarde voor je geld',
                'positieve_feedback_3' => null,
                'negatieve_feedback_1' => 'maakt voor het mooie iets te veel lawaai',
                'negatieve_feedback_2' => null,
                'negatieve_feedback_3' => null,
                'mening'=> 'Mooi product. Ik ben er erg tevreden mee.',
                'naam'=> 'Anoniem' ,
                ]);
            }
        }

        echo 'Er zijn 5 reviews per laptop aangemaakt.';


    }
}
