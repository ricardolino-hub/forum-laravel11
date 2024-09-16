<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReplyQuestionRequest;
use App\Models\ReplyQuestion;
use App\Models\Question;
use App\Mail\QuestionRepliedMail;
use Illuminate\Support\Facades\Mail;
use App\Events\QuestionReplied;

class ForumController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->paginate(5);
        return view('forum.index', compact('questions'));
    }

    public function show(string $id)
    {
        if (! $question = Question::with('user', 'replies')->find($id)) {
            abort(404);
        }

        return view('forum.show', compact('question'));
    }

    public function reply(StoreReplyQuestionRequest $request)
    {
        if (! $question = Question::find($request->question_id)) {
            abort(404);
        }

        $createdReply = ReplyQuestion::create([
            'user_id' => Auth::id(),
            ...$request->validated()
        ]);

        QuestionReplied::dispatch($question->user, $createdReply);

        return redirect()->back()->with('success', 'Resposta enviada com sucesso!');
    }
}
