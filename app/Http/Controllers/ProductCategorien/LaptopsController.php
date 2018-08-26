<?php

namespace App\Http\Controllers\ProductCategorien;

use App\LaptopReview;
use App\Laptop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laptops = Laptop::all()->sortBy('specsTag');
        $min=$laptops->min('price');
        $max=$laptops->max('price');
        $avg=round(($min+$max)/2);
        $screendiameter = Laptop::select('screen_diameter')->whereNotNull('screen_diameter')->distinct()->orderBy('screen_diameter')->get();;
        $processor = Laptop::select('processor')->distinct()->orderBy('processor','desc')->get();;
        $merken = Laptop::select('specsTag')->distinct()->orderBy('specsTag')->get();
        $priced=0;
      
        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'processor' => $processor,
            'min' => round($min),
            'max' => round($max),
            'avg' => round($avg),
            'priced' => $priced   
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {
        $laptop->increment('aantal_views');
        $reviews = LaptopReview::where('laptop_id', $laptop->id)->orderBy('created_at', 'desc')->get();

        //dd($reviews[0]->GemiddeldeCijfer);

        if($reviews->count()>0){
           $aanrader = $this->aanrader($reviews); 
           $score_bedieningsgemak = $this->scoreBedieningsgemak($reviews);
           $score_gebruiksvriendelijkheid = $this->scoreGebruiksVriendelijkheid($reviews);
           $score_snelheid = $this->scoreSnelheid($reviews);
           $score_mogelijkheid = $this->scoreMogelijkheid($reviews);
        }else{
            $aanrader = null;
            $score_bedieningsgemak = false;
            $score_gebruiksvriendelijkheid = false;
            $score_snelheid = false;
            $score_mogelijkheid = false;
        }

        
        return view('product_categorien.laptops.show',[
            'laptop' => $laptop,
            'reviews' => $reviews,
            'aanrader' => $aanrader,
            'score_bedieningsgemak' => $score_bedieningsgemak,
            'score_gebruiksvriendelijkheid' => $score_gebruiksvriendelijkheid,
            'score_snelheid' => $score_snelheid,
            'score_mogelijkheid' => $score_mogelijkheid,
            ]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function aanrader($reviews){

         // aanrader? boven de 70%
         $count_aanrader = 0;
         $total_count = 0;
         foreach($reviews as $review){
             if($review->aanrader){
                 $count_aanrader++;
                 $total_count++;
                 continue;
             }
             $total_count++;
         }
 
         if($total_count > 0){
             $aanrader = $count_aanrader/$total_count*100;
                 if($aanrader >= 70){
                     $aanrader = 70;
                 }else{$aanrader = 69;}
            }
        return $aanrader;

    }


        public function scoreBedieningsgemak($reviews){
            $total_score = 0;
            $count = 0;
             foreach($reviews as $review){
                 $total_score +=$review->bedieningsgemak*2;
                 $count++;
             }
    
             $score_bedieningsgemak = $total_score/$count;
             return number_format($score_bedieningsgemak, 1, '.', '');
        }


        public function scoreGebruiksVriendelijkheid($reviews){
            $total_score = 0;
            $count = 0;
             foreach($reviews as $review){
                 $total_score +=$review->gebruiksvriendelijkheid*2;
                 $count++;
             }
    
             $score_gebruiksvriendelijkheid = $total_score/$count;
             return number_format($score_gebruiksvriendelijkheid, 1, '.', '');
        }

        public function scoreSnelheid($reviews){
            $total_score = 0;
            $count = 0;
             foreach($reviews as $review){
                 $total_score +=$review->snelheid*2;
                 $count++;
             }
    
             $score_snelheid = $total_score/$count;
             return number_format($score_snelheid, 1, '.', '');
        }

        public function scoreMogelijkheid($reviews){
            $total_score = 0;
            $count = 0;
             foreach($reviews as $review){
                 $total_score +=$review->mogelijkheid*2;
                 $count++;
             }
    
             $score_mogelijkheid = $total_score/$count;
             return number_format($score_mogelijkheid, 1, '.', '');
        }


    





}
