<?php
/**
 * Created by PhpStorm.
 * User: Momen
 * Date: 11/23/16
 * Time: 5:56 PM
 */

namespace App\Http\Controllers;

use App\Helpers\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SuccessError
{

    public static function Success($message)
    {
            session()->flash('status', 'alert-success');
            session()->flash('message', $message);

    }

    public static function Error($message)
    {
            session()->flash('status', 'alert-danger');
            session()->flash('message', $message);

    }
}
