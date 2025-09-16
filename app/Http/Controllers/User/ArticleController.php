<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'user'])->latest()->paginate(6);
        return view('user.pages.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('user.pages.dashboard.articles.create', compact('categories', 'users'));
    }

    public function store(CreateArticleRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['slug'] = $this->generateUniqueSlug($data['title']);
        $date['status'] = 'draft';

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create($data);

        return redirect()->route('dashboard.user')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function show(Article $article)
    {
        return view('user.pages.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $users = User::all();
        return view('user.pages.dashboard.articles.edit', compact('article', 'categories', 'users'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        $data['user_id'] = $article->user_id;
        $data['slug'] = $this->generateUniqueSlug($data['title'], $article->id);

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            unset($data['thumbnail']);
        }

        $data['status'] = $article->status;

        $article->update($data);

        return redirect()->route('dashboard.user')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        // Hapus file thumbnail dulu
        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        // Hapus data artikel
        $article->delete();

        return redirect()->route('dashboard.user')->with('success', 'Artikel berhasil dihapus');
    }

    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = \Illuminate\Support\Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (\App\Models\Article::where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function toggleStatus(Article $article)
    {
        $article->status = $article->status === 'draft' ? 'published' : 'draft';
        $article->save();

        return redirect()->route('dashboard.user')
            ->with('success', 'Status artikel berhasil diubah menjadi ' . $article->status);
    }
}

