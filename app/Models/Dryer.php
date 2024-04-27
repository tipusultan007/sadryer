<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dryer
 *
 * @property $id
 * @property $product_id
 * @property $weight
 * @property $quantity
 * @property $date
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dryer extends Model
{

    static $rules = [
		'product_id' => 'required',
		'date' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','dryer_no','weight','quantity','date','status'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function dryerToStocks()
    {
        return $this->hasMany(DryerToStock::class);
    }

}
