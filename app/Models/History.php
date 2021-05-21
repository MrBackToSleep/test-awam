<?php

namespace App\Models;

use Carbon\Carbon;
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

}
