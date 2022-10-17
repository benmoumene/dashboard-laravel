<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactReply extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    public function contact()
    {
        return $this->belongsTo('\App\Models\Contact','contact_id');
    }
    public function files(){
        return $this->hasMany(\App\Models\HubFile::class,'type_id')->where('type','CONTACT_REPLY');
    }
}
