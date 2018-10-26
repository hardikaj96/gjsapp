<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cost;
use JavaScript;

class CostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $fingersize =  DB::table('fingersize')->get();
        $carat =  DB::table('carat')->get();
        $diamond =  DB::getSchemaBuilder()->getColumnListing('diamond');
        $stylet =  DB::table('style')->get();
        $diamall = DB::table('diamond')->get()->all();
        $result = DB::table('diamond')->get();
        Javascript::put([
            'ring_style'=>DB::table('style')->pluck('stylename'),
            'costs'=> DB::table('style')->pluck('cost'),
            'diamond_size'=> DB::table('diamond')->pluck('diamond_size'),
            'VS2_SI1'=> DB::table('diamond')->pluck('VS2_SI1'),
            'SI2'=> DB::table('diamond')->pluck('SI2'),
            'Color'=> DB::table('diamond')->pluck('Color')
        ]);
        return view('costs.index')->with('fingersize',$fingersize)->with('carat', $carat)->with('diamond', $diamond)->with('stylet', $stylet);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costs.create');
    }
    public function admin()
    {
        return view('costs.admin');
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
        //phh
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
