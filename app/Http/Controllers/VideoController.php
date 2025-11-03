<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoAccess;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        // Semua user harus login
        $this->middleware('auth');

        // Admin punya full akses kecuali index & show (bisa diakses customer)
        $this->middleware('role:admin')->except(['index', 'show']);
    }

    /**
     * Tampilkan semua video (admin & customer)
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('videos.index', compact('videos'));
    }

    /**
     * Form tambah video (admin)
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Simpan video baru (admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);

        Video::create($request->only(['title', 'description', 'url']));

        return redirect()->route('videos.index')->with('success', '✅ Video successfully created!');
    }

    /**
     * Tampilkan detail video (untuk admin & customer)
     */
    public function show(Video $video)
    {
        $user = auth()->user();

        // Admin langsung bisa nonton
        if ($user->role === 'admin') {
            return view('videos.show', [
                'video' => $video,
                'hasAccess' => true,
                'access' => null,
            ]);
        }

        // Customer → cek apakah punya akses aktif
        $access = VideoAccess::where('user_id', $user->id)
            ->where('video_id', $video->id)
            ->first();

        // Jika tidak ada akses → tampilkan tombol request
        if (!$access) {
            return view('videos.show', [
                'video' => $video,
                'hasAccess' => false,
                'access' => null,
            ]);
        }

        // Jika sudah expired → hapus otomatis supaya bisa request ulang
        if ($access->expired_at < now()) {
            $access->delete();
            return view('videos.show', [
                'video' => $video,
                'hasAccess' => false,
                'access' => null,
            ]);
        }

        // Jika masih aktif → tampilkan video
        return view('videos.show', [
            'video' => $video,
            'hasAccess' => true,
            'access' => $access,
        ]);
    }

    /**
     * Form edit video (admin)
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update data video (admin)
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);

        $video->update($request->only(['title', 'description', 'url']));

        return redirect()->route('videos.index')->with('success', '✅ Video successfully updated!');
    }

    /**
     * Hapus video (admin)
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('success', '🗑️ Video deleted successfully.');
    }
}
