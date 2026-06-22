<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Activity; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{    
    public function indexPublik()
    {
        $newsList = News::orderBy('published_date', 'desc')->get();
        $activities = Activity::orderBy('execution_time', 'desc')->get();
        return view('berita.index', compact('newsList', 'activities'));
    }

    public function bacaPublik($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->increment('views');

        $recentNews = News::where('id', '!=', $id)
                          ->orderBy('published_date', 'desc')
                          ->take(5)
                          ->get();

        return view('berita.detail', compact('newsItem', 'recentNews'));
    }

    public function bacaKegiatan($id)
    {
        $activity = Activity::findOrFail($id);
        
        $newsItem = new \stdClass();
        $newsItem->title = $activity->title;
        $newsItem->views = 0; 
        $newsItem->published_date = $activity->execution_time; 
        $newsItem->image = $activity->image;
        
        $infoTambahan = '';
        if (!empty($activity->executor)) {
            $infoTambahan .= '<p class="text-xs font-bold text-amber-600 uppercase tracking-wider mb-1">Pelaksana: ' . $activity->executor . '</p>';
        }
        if (!empty($activity->location)) {
            $infoTambahan .= '<p class="text-xs font-medium text-gray-500 mb-4">Lokasi: ' . $activity->location . '</p>';
        }
        
        $newsItem->content = $infoTambahan . ($activity->description ?? '');

        $recentNews = News::orderBy('published_date', 'desc')->take(5)->get();

        return view('berita.detail', compact('newsItem', 'recentNews'));
    }


    public function index()
    {
        $newsList = News::orderBy('published_date', 'desc')->get();
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'published_date' => 'required|date',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    
        $data = $request->except(['_token']);
        $data['views'] = rand(10, 100);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . '_news_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/news'), $nama_file);
            $data['image'] = 'uploads/news/' . $nama_file;
        }
    
        News::create($data);
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('admin.news.edit', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $newsItem = News::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            if ($newsItem->image && File::exists(public_path($newsItem->image))) {
                File::delete(public_path($newsItem->image));
            }
            
            $file = $request->file('image');
            $nama_file = time() . '_news_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/news'), $nama_file);
            $data['image'] = 'uploads/news/' . $nama_file;
        }

        $newsItem->update($data);
        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        
        if ($newsItem->image && File::exists(public_path($newsItem->image))) {
            File::delete(public_path($newsItem->image));
        }

        $newsItem->delete();
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
}