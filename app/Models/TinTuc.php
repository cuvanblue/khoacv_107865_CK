<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $primaryKey = 'matintuc';
    use HasFactory;
    protected $fillable=[
        'matintuc',
        'tieude',
        'noidung',
        'matheloai'
      ];
}
