<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\AccessRequest;
use App\Models\VideoAccess;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $videos = Video::count();
            $customers = User::where('role', 'customer')->count();
            $pending = AccessRequest::where('status', 'pending')->count();
            $approved = VideoAccess::count();

            return view('dashboard', compact('videos', 'customers', 'pending', 'approved'));
        } else {
            // 🔹 Dashboard khusus customer
            $videos = Video::count();
            $requests = AccessRequest::where('user_id', $user->id)->count();
            $approved = VideoAccess::where('user_id', $user->id)
                ->where('expired_at', '>', now())
                ->count();

            return view('dashboard_customer', compact('videos', 'requests', 'approved'));
        }
    }
}
