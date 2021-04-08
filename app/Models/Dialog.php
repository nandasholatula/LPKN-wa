<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = "id";
    protected $keyType = "string";

    public function messages()
    {
        return $this->hasMany(Message::class, 'chatId')->orderBy("time", "desc");
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class, 'chatId')->orderBy("time", "desc");
    }
}
