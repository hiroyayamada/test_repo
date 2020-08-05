<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//論理削除
use Illuminate\Database\Eloquent\SoftDeletes;

class auths extends Model
{
    //
    use SoftDeletes;

    protected $guarded = array('id');
}
