<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "first_name",
        "last_name",
        "number",
        "number-type",
        "email",
        "email-type",
        "notes",
        "address",
        "photo",
        "user_id",
    ];

    protected $appends = ['photo'];

    public function getPhotoLinkAttribute(): string {
        return !empty($this->photo) ? '/storage/images/' . $this->photo : '';
    }
}
