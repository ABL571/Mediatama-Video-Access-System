<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VideoAccess;
use Illuminate\Support\Facades\Auth;

class CheckVideoAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $video = $request->route('video');

        // Admin bebas akses
        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        // Ambil data akses video (kalau ada)
        $access = VideoAccess::where('user_id', $user->id)
            ->where('video_id', $video->id)
            ->first();

        // Jika belum pernah request sama sekali -> biarkan lanjut ke halaman show
        if (!$access) {
            return $next($request);
        }

        // Jika akses masih aktif (belum expired) -> lanjut
        if ($access->expired_at > now()) {
            return $next($request);
        }

        // Kalau sudah expired -> arahkan balik ke daftar video
        return redirect()
            ->route('videos.index')
            ->with('error', '⚠️ Your access to this video has expired. Please request access again.');
    }
}
