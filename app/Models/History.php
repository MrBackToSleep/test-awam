<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $log
 */
class History extends Model
{
    protected $table = 'history';

    /**
     * @var array
     */
    protected $fillable = ['log'];

    /**
     * Retourne tous les logs d'une journée spécifique
     *
     * @param $jour
     * @return mixed
     */
    public static function logsFor(Carbon $jour = null){
        if(is_null($jour)){
            $jour = Carbon::now();
        }
        $jour = $jour->format('Y-m-d');
        return self::query()->where('created_at', '>=', $jour. ' 00:00:00')
            ->where('created_at', '<=',$jour. ' 23:59:59')
            ->get();
    }

}
