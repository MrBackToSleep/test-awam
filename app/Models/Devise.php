<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $code
 * @property string $symbole
 * @property float $equivalent_USD
 */
class Devise extends Model
{
    protected $table = 'devises';

    /**
     * @var array
     */
    protected $fillable = ['code', 'symbole', 'equivalent_USD'];

}
