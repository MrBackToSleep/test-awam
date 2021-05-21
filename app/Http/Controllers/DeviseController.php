<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use App\Services\DeviseService;
use Illuminate\Http\Request;

class DeviseController extends Controller
{
    public function index(){
        return view('index', [
            'devises' => Devise::all()
        ]);
    }

    public function calcul(Request $request, DeviseService $deviseService){
        // Récupération des objets
        $devise1 = Devise::query()->where('code', '=', $request->get('devise1'))->first();
        $devise2 = Devise::query()->where('code', '=', $request->get('devise2'))->first();

        return $deviseService->calcul(
            $request->get('montant1'), $devise1,
            $request->get('montant2'), $devise2
        );
    }
}
