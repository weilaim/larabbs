<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'reply_count',
        'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];


    //这两个关联都「从属」关系，一般我们使用 一对一 对应关系来表示，使用 belongsTo() 方法来实现


    //category—— 一个话题属于一个分类；
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //user —— 一个话题属于一个作者。
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
