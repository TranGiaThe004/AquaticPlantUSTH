<?php

namespace App\Providers;

use App\Models\Tank;
use App\Models\WaterLog;
use App\Models\PlantLog;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Policies\TankPolicy;
use App\Policies\WaterLogPolicy;
use App\Policies\PlantLogPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\AnswerPolicy;
use App\Policies\PostPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Tank::class      => TankPolicy::class,
        WaterLog::class  => WaterLogPolicy::class,
        PlantLog::class  => PlantLogPolicy::class,
        Question::class  => QuestionPolicy::class,
        Answer::class    => AnswerPolicy::class,
        Post::class      => PostPolicy::class,
        Comment::class   => CommentPolicy::class,
        // User chưa cần policy riêng
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
