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

        // Delete all votes of this review
        $this->delete();

        // Calling the same method to all of the child of this review
        $this->replies->each->deleteRelatedData();
      }
}
