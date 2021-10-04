<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function likePost($id)
    {
        // here you can check if post exists or is valid
        $post = Post::findorfail($id);
        $this->handleLike('App\Post', $id);
        return json_encode(shortNumber($post->likes()->count()));
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->
        whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
