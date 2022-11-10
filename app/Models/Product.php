<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory, SearchableTrait, Rateable;

    const STATUS_PUBLISH = "PUBLISH";

    const STATUS_UN_PUBLISH = "UN_PUBLISH";

    protected $fillable = [
        'title',
        'body',
        'description',
        'price',
        'category_id',
        'image',
    ];

    protected $searchable = [
        'columns' => [
            'products.title'   => 10,
            'products.body'    => 9,
            'categories.name'  => 1,
        ],
        'joins' => [
            'categories' => ['products.category_id', 'categories.id'],
        ],
    ];

    protected $casts = [
        'available' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageTumblr(): ?string
    {
        return $this->image;
    }

    public function isPublished()
    {
        return ($this->status == self::STATUS_PUBLISH);
    }

    public function isUNPublished()
    {
        return !$this->isPublished();
    }

    public function hasImage(): bool
    {
        return (bool)!is_null($this->getImageTumblr());
    }

    public function getPriceAttribute($value)
    {
        return number_format($value);
    }

    public function getPriceWithToman()
    {
        return (string) $this->price . " تومان";
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value;
        $this->attributes['body'] = Str::limit($value, 150, $end='...');
    }

}
