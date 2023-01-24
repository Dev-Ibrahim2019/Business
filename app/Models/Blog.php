<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'desc', 'image', 'auther', 'auther_image'
    ];

    public function getImageUrlAttribute() {
        if (!$this->image) {
            return 'https://propertywiselaunceston.com.au/wp-content/themes/property-wise/images/no-image.png';
        }
        if (Str::startsWith($this->image, 'https', 'http')) {
            return $this->image;
        }
        return asset('storage/'.$this->image);
    }
}
