<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Article;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Data Collection
        //$article_count = Article::count();
        $article_count = 1;
        $contact_count = 1;
        $message_count = 1;

        $visitor_count = 1;
        $user_logged_in_count = 1;

        $user_count = User::count();
        $user_suspended_count = 0;
        $user_banned_count = 0;
        $user_unverified_count = 0;

        // Render View Code
        return view('admin.index')
            ->with('article_count', $article_count)
            ->with('contact_count', $contact_count)
            ->with('message_count', $message_count)
            ->with('visitor_count', $visitor_count)
            ->with('user_logged_in_count', $user_logged_in_count)
            ->with('user_count', $user_count)
            ->with('user_suspended_count', $user_suspended_count)
            ->with('user_banned_count', $user_banned_count)
            ->with('user_unverified_count', $user_unverified_count);
    }
}
