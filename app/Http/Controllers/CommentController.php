<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    //Store new comment
    public function store(CommentRequest $request)
    {
        //Create and Validate all request
        $comment = Comment::create($request->validated());
        return response()->json(['message' => 'Comment Added Successfully'], 200);
    }

    //Update Comment
    public function update(CommentRequest $request, $id)
    {
        $comments = Comment::find($id);

        if($comments){
            $comments->title = $request->title;
            $comments->name = $request->name;
            $comments->email = $request->email;
            $comments->comment = $request->comment;
            $comments->blog_id = $request->blog_id;
            $comments->update();

            return response()->json(['message' => 'Comment Updated Successfully'], 200);
        }
        else{
            return response()->json(['message'=>'No Comment Found'], 404);
        }
    }

    //Delete Comment
    public function delete($id)
    {
        $comment = Comment::find($id);

	    if (!$comment) {
            return response()->json(['message' => 'Comment does not exist'], 404);
        }

        $comment->delete();
        return response()->json(['message'=> 'Comment Deleted'], 200);

    }
}
