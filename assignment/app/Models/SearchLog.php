<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $fillable = [
        'user_id',
        'keyword',
        // thêm các thuộc tính khác nếu cần
    ];
    // Thuộc tính này là true theo mặc định, bạn không cần phải khai báo nếu không thay đổi
    public $timestamps = true;
}
