<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cost;
use JavaScript;

class CostsController extends Controller
{
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
}
