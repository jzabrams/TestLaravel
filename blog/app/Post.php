<?php

namespace App;

use Carbon\carbon;

class Post extends Model
{

    public function comments(){

        return $this->hasMany(Comment::class);

    }

    public function addComment($body){

        $this->comments()->create(compact('body'));

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function scopeFilter($query, $filters){

        if(!empty($filters['month'])){

            $query->whereMonth('created_at', Carbon::parse(request('month'))->month);

        }

        if(!empty($filters['year'])){

            $query->whereYear('created_at', request('year'));

        }

    }

    public static function archives(){
        return static::selectRaw('year(created_at)  year, monthname(created_at)  month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()->toArray();
    }

}
