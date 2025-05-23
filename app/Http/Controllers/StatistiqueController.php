<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Document;
use App\Models\Courrier;

class StatistiqueController extends Controller
{
    public function get_stat($debut, $fin)
    {
        $domaine = DB::select('select di.name as name, count(e.id) as y  from public.clients e, public.domaines di  where
         e.domaine_id=di.id  group by di.name;');
    //      $clients = DB::select("
    //      SELECT TO_CHAR(created_at, 'YYYY-MM-DD') AS name, COUNT(id) AS y
    //      FROM public.clients
    //      GROUP BY name
    //      ORDER BY name
    //  ");
    //    $client  = DB::select(' select count(e.id) from public.clients e;');
        $client = Client::count();
        $courrier = Courrier::count();
        $docnbr = Document::count();

         return compact('domaine', 'client', 'courrier', 'docnbr');

    } 
}
