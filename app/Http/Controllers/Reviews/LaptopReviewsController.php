<?php

namespace App\Http\Controllers\Reviews;

use App\LaptopReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopReviewsController extends Controller
{
    public function store(Request $request, $id){

        $this->validate(request(),[
            'aanrader'=> 'required',
            'be'=> 'required',
            'ge'=> 'required',
            'sn'=> 'required',
            'mo'=> 'required',
            'positief_1'=> 'nullable|string|max:60',
            'negatief_1'=> 'nullable|string|max:60',
            'positief_2'=> 'nullable|string|max:60',
            'negatief_2'=> 'nullable|string|max:60',
            'positief_3'=> 'nullable|string|max:60',
            'negatief_3'=> 'nullable|string|max:60',
            'textarea'  => 'nullable|max:600',
            'naam'=> 'nullable|string|max:20'
        ]);

        LaptopReview::create([
            'user_id' => auth()->id(),
            'laptop_id' => $id,
            'aanrader' => $request->aanrader,
            'bedieningsgemak' => $request->be,
            'gebruiksvriendelijkheid' => $request->ge,
            'snelheid' => $request->sn,
            'mogelijkheid' => $request->mo,
            'positieve_feedback_1' => $request->positief_1,
            'positieve_feedback_2' => $request->positief_2,
            'positieve_feedback_3' => $request->positief_3,
            'negatieve_feedback_1' => $request->negatief_1,
            'negatieve_feedback_2' => $request->negatief_2,
            'negatieve_feedback_3' => $request->negatief_3,
            'mening'=> $request->textarea,
            'naam'=> (isset($request->naam))? $request->naam : 'Anoniem',
            ]);
           
            return back();

    }

}
