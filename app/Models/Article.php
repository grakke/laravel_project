<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2018/7/21
 * Time: 9:11 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

}
