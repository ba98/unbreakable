<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function deleteRelatedData() {

        // Delete the comment
        $this->delete();

        // Delete every reply that belongs to the deleted comment
        $this->replies->each->deleteRelatedData();
      }
}
