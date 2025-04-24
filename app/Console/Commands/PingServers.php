<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PingServers extends Command
{
    protected $signature = 'servers:ping';
    protected $description = 'Ping all servers and update status';

    public function handle()
    {
        $servers = Server::all();

        foreach ($servers as $server) {
            // Wenn im Live-Modus: Versuche Verbindung
            if ($server->mode === 'live') {
                $online = @fsockopen($server->ip, 80, $errno, $errstr, 3);
                $server->status = $online ? 'online' : 'outage';
                if ($online) fclose($online);
            }

            $server->last_checked_at = Carbon::now();
            $server->save();
        }

        $this->info('Alle Server erfolgreich gepingt.');
    }
}
