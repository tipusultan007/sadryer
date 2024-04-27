<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DryerToStockItem
 *
 * @property $id
 * @property $dryer_to_stock_id
 * @property $product_id
 * @property $quantity
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DryerToStockItem extends Model
{

    static $rules = [
		'dryer_to_stock_id' => 'required',
		'product_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dryer_to_stock_id','product_id','quantity','weight','type'];

    public function dryerToStock()
    {
        return $this->belongsTo(DryerToStock::class);
    }

}
