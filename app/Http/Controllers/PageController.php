<?php

namespace App\Http\Controllers;

use App\Enums\FeedbackStatus;
use App\Enums\PageStatus;
use App\Models\Author;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\FeedbackBan;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::get('/');
        $q = Post::publised()->latest('published_at');
        $latestIndustryNews = (clone $q)->whereRelation('tags', 'slug', 'industry')->limit(2)->get();
        $latestPcNews = (clone $q)->whereRelation('tags', 'slug', 'pc')->limit(3)->get();
        $latestXboxNews = (clone $q)->whereHas('tags', fn ($qq) => $qq->whereIn('slug', ['xbox-one', 'xbox-series-x-s', 'xbox']))->limit(3)->get();
        $latestPsNews = (clone $q)->whereHas('tags', fn ($qq) => $qq->whereIn('slug', ['playstation-5', 'playstation-4']))->limit(2)->get();
        $ids = $latestIndustryNews->pluck('id')->merge($latestPcNews->pluck('id'))->merge($latestXboxNews->pluck('id'))->merge($latestPsNews->pluck('id'));
        $latestNews = (clone $q)->whereRelation('category', 'slug', 'news')->whereNotIn('id', $ids)->limit(8)->get();
        $newsCategory = Category::where('slug', 'news')->first();
        $authors = Author::get();

        return view('index', compact('page', 'authors', 'latestIndustryNews', 'latestPcNews', 'latestXboxNews', 'latestPsNews', 'latestNews', 'newsCategory'));
    }

    public function show(Request $request)
    {
        $page = Page::query()
            ->where('link', \Request::path())
            ->where('status', PageStatus::PUBLISHED)
            ->firstOrFail();

        return view('page', compact('page'));
    }

    public function contactUs(Request $request)
    {
        if (! $request->ajax()) {
            $page = Page::get('contact');

            return view('contact-us', compact('page'));
        }

        $input = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'text' => ['required', 'string', 'max:2000'],
        ]);

        $user = auth()->user();
        $ban = $user ? FeedbackBan::where('type', 'user')->where('value', $user->id)->first() : null;
        $ban ??= FeedbackBan::where('type', 'ip')->where('value', $request->ip())->first();
        $ban ??= FeedbackBan::where('type', 'name')->where('value', $input['name'])->first();
        $ban ??= FeedbackBan::where('type', 'email')->where('value', $input['email'])->first();

        if ($ban && $ban->is_active) {
            // activity('feedback-bans')
            //     ->event('catch')
            //     ->withProperties(infoForActivityLog())
            //     ->on($ban)
            //     ->log('');

            if ($ban->action == 'abort') {
                abort(429);
            } elseif ($ban->action == 'spam') {
                $input['status'] = FeedbackStatus::SPAM;
            }
        }

        $input['user_id'] = $user->id ?? null;
        $input['ip'] = $request->ip();

        Feedback::create($input);

        return $this->jsonSuccess('Message send');
    }

    public function privacy()
    {
        $page = Page::get('privacy-policy');
        $blocks = $page->blocks->sortBy('order');

        return view('page-with-blocks', compact('page', 'blocks'));
    }

    public function terms()
    {
        $page = Page::get('terms-of-use');
        $blocks = $page->blocks->sortBy('order');

        return view('page-with-blocks', compact('page', 'blocks'));
    }

    public function aboutUs()
    {
        $page = Page::get('about-us');
        $blocks = $page->blocks->sortBy('order');

        return view('page-with-blocks', compact('page', 'blocks'));
    }

    public function cookiePolicy()
    {
        $page = Page::get('cookie-policy');
        $blocks = $page->blocks->sortBy('order');

        return view('page-with-blocks', compact('page', 'blocks'));
    }
}
