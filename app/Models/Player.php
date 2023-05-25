<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $table = 'player';

    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'active',
    ]; 

    static function detail($id)
    {
        return self::find($id)->toArray();
    }

    static function list(){

        return self::orderBy('name')->get();

    }
}
