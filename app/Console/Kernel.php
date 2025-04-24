protected function schedule(Schedule $schedule)
{
$schedule->call(function () {
$servers = \App\Models\Server::where('mode', 'live')->get();

foreach ($servers as $server) {
$ping = @fsockopen($server->ip, 80, $errno, $errstr, 2);
$status = $ping ? 'online' : 'outage';

// Optional: Error detection o. Ä. hier erweitern
$uptime = ... // hier eigene Uptime-Logik einbauen

$server->update([
'status' => $status,
'last_checked_at' => now(),
'uptime' => $uptime,
]);

if ($ping) {
fclose($ping);
}
}
})->everyTenMinutes();
}
protected function schedule(Schedule $schedule)
{
$schedule->command('servers:ping')->everyTenMinutes();
}
protected function schedule(Schedule $schedule): void
{
$schedule->command('servers:check')->everyTenMinutes();
}
