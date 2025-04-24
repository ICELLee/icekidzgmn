<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckServerStatus extends Command
{
    protected $signature = 'servers:check';
    protected $description = 'Ping all servers and update their status';

    public function handle()
    {
        $servers = Server::where('mode', 'live')->get();

        foreach ($servers as $server) {
            $ip = $server->ip;
            $ping = @fsockopen($ip, 80, $errno, $errstr, 2);

            $now = now();
            $server->last_checked_at = $now;

            if ($ping) {
                fclose($ping);

                // Wenn online => uptime erhöhen
                $server->status = 'online';
                $server->uptime = min($server->uptime + 0.01, 100); // max 100%
            } else {
                $server->status = 'outage';
            }

            $server->save();
        }

        $this->info('Server status updated.');
    }
}
