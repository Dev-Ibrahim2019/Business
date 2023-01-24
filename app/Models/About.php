<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'about', 'vision', 'history', 'image'
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
