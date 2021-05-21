<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use App\Services\DeviseService;
use App\Services\HistoryService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function sendMailRecapitulatif(HistoryService $historyService){
        return $historyService->sendMailRecapitulatif();
    }
}
