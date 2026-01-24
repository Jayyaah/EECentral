<?php
namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function view(User $user, Article $article): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function update(User $user, Article $article): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->role === 'admin';
    }
}
