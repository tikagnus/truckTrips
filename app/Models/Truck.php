<?php

namespace App\Models;


class Truck extends BaseModel
{
    protected $fillable = [
        'name',
        'registration',
        'external_id',
        'vin',
    ];

    /**
     * @param $id
     * @return $this
     */
    protected function parseRequest($id)
    {
        if (is_numeric($id)) {
            return static::find($id, ['id']);
        }

        $id = str_replace('-', '', str_replace(' ', '', strtoupper($id)));
        $byName = static::where('registration', $id)->first();

        if ($byName) {
            return $byName;
        }

        return static::create([
            'registration' => $id
        ]);

    }


}
