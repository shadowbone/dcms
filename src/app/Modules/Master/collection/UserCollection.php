<?php

namespace App\Modules\Master\Collection;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class UserCollection implements Arrayable, Jsonable
{

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        if($this->user){
            $data = [];
            foreach ($this->user as $value) {
                $data[] = $this->toCollect($value);
            }
            return [
                'data' => $data
            ];
        }
        return $this->toCollect($this->user);
    }

    private function toCollect($data)
    {
        dd($data);
        return [
            'name' => $data->name
        ];
    }
}