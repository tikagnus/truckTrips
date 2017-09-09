<?php

namespace App\Models;


class Trip extends BaseModel
{
    protected $fillable = [
        'sender_company_id',
        'receiver_company_id',
        'truck_id',
        'driver_user_id',
        'description',
        'pay_distance',
        'payed_distance',
        'real_distance',
        'load_weight',
        'payed_load_weight',
        'load_volume',
        'payed_load_volume',
        'event_type_id',
    ];

    public function startPoint()
    {
        return $this->hasOne(Point::class)
            ->where('point_type_id', PointType::START)
            ->orderBy('created_at');
    }

    public function endPoint()
    {
        return $this->hasOne(Point::class)
            ->where('point_type_id', PointType::END)
            ->orderBy('created_at');

    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function sender()
    {
        return $this->belongsTo(Company::class, 'sender_company_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Company::class, 'receiver_company_id');
    }

}
