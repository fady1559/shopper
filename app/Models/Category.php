<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    //  users
    public function create_user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'create_user_id');
    }

    public function update_user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
{

return $this->belongsTo(User::class,'update_user_id');

}

public function subcategories() : \Illuminate\Database\Eloquent\Relations\BelongsTo
{
    return $this->hasMany(Subcategory::class);
}

}
