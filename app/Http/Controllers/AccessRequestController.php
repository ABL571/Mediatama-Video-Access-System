<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessRequest;
use App\Models\VideoAccess;
use Illuminate\Support\Facades\Auth;

class AccessRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan semua request (admin lihat semua, customer lihat miliknya sendiri)
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $requests = AccessRequest::with(['user', 'video'])->latest()->get();
        } else {
            $requests = AccessRequest::with(['video'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('requests.index', compact('requests'));
    }

    /**
     * Customer mengirim permintaan akses video
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
        ]);

        AccessRequest::create([
            'user_id' => Auth::id(),
            'video_id' => $request->video_id,
            'status' => 'pending',
        ]);

        return back()->with('success', '✅ Request sent successfully! Waiting for admin approval.');
    }

    /**
     * Admin menyetujui permintaan akses
     */
    public function approve(AccessRequest $accessRequest)
    {
        $accessRequest->update(['status' => 'approved']);

        VideoAccess::create([
            'user_id' => $accessRequest->user_id,
            'video_id' => $accessRequest->video_id,
            'expired_at' => now()->addHours(2), // ⏰ berlaku 2 jam
        ]);

        return back()->with('success', '🎉 Access granted for 2 hours!');
    }

    /**
     * Admin mencabut akses video
     */
    public function revoke(AccessRequest $accessRequest)
    {
        $accessRequest->update(['status' => 'revoked']);

        VideoAccess::where('user_id', $accessRequest->user_id)
            ->where('video_id', $accessRequest->video_id)
            ->delete();

        return back()->with('success', '⚠️ Access revoked successfully.');
    }
}
