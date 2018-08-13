<?php

namespace App\Http\Controllers\Search;

use App\Laptop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->search);
        //$q = $request->search;
       // $q=explode(" ",$string);
        $a = array('apple');
        //dd($q);

        $search=Laptop::selectRaw("MATCH(title,short_description) AGAINST(? IN BOOLEAN MODE) AS score", $a)
        >whereRaw("MATCH (title, short_description) AGAINST (? IN BOOLEAN MODE)", $a)
        ->orderByDesc('score')->get();

     

dd($search);




        // $search = \DB::select(\DB::raw("SELECT *, MATCH(title, short_description) AGAINST('$q') as score
        // FROM laptops
        // WHERE MATCH(title, short_description) AGAINST('$q') AND 
        // WHERE score > 1
        // order by score desc
        // LIMIT 3;"));

        return view('search_results',[
            'search' => $search,
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
    public function show($id)
    {
        //
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
}
