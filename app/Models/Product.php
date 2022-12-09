<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    
    use HasFactory;
    use HasUuids;
    protected $table = 'products';

    protected $fillable = ['title', 'description', 'image', 'rating', 'added', 'style', 'quantity', 'category', 'slug'];
        


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'productId';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';


}
