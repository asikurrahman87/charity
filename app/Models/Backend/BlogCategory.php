<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public static function updateOrCreateBlogCategory($request, $id = null)
    {
        BlogCategory::updateOrCreate(['id' => $id], [
            'name'  => $request->name,
            'status'  => $request->status,
        ]);
    }
}
