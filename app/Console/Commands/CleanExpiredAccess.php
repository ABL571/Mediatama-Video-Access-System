<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VideoAccess;
use Carbon\Carbon;

class CleanExpiredAccess extends Command
{
    protected $signature = 'access:clean';
    protected $description = 'Remove expired video_accesses older than 30 days (optional)';

    public function handle()
    {
        $threshold = Carbon::now()->subDays(30);
        VideoAccess::whereNotNull('expired_at')->where('expired_at', '<', $threshold)->delete();
        $this->info('Old expired accesses cleaned.');
    }
}
