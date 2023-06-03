<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;
class LogController extends Controller
{
    public static function store($data)
    {
        $create = Logs::create(
            [
                'current_data' => $data['current_data'],
                'existing_data' => $data['existing_data'],
                'created_by' => $data['created_by']
            ]
        );

        if($create){
            return true;
        }

        return false;
    }
}
