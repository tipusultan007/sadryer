<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DryerToStock
 *
 * @property $id
 * @property $dryer_id
 * @property $rice
 * @property $khud
 * @property $tamri
 * @property $tush
 * @property $kura1
 * @property $kura2
 * @property $balu
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DryerToStock extends Model
{

    static $rules = [
		'dryer_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dryer_id','rice','khudi','tamri','tush','dryer_kura','silky_kura','bali','wastage','date'];

    public function dryer()
    {
        return $this->belongsTo(Dryer::class);
    }

    public function items()
    {
        return $this->hasMany(DryerToStockItem::class);
    }

}
