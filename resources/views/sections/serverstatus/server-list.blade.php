<div class="bg-gray-900/50 border border-gray-800 rounded-xl overflow-hidden shadow-xl" data-aos="fade-up">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-800/50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Server Name</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Server ID</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Uptime</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Letzte Vorfälle</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
            @foreach($servers as $server)
                @php
                    // Status colors and icons
                    $statusConfig = [
                        'online' => ['color' => 'bg-green-500', 'icon' => 'fas fa-check-circle'],
                        'error' => ['color' => 'bg-yellow-500', 'icon' => 'fas fa-exclamation-triangle'],
                        'outage' => ['color' => 'bg-red-500', 'icon' => 'fas fa-times-circle'],
                        'maintenance' => ['color' => 'bg-purple-500', 'icon' => 'fas fa-tools']
                    ];

                    $status = $statusConfig[$server['status']];
                @endphp

                <tr class="hover:bg-gray-800/30 transition-colors duration-300">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-800 flex items-center justify-center mr-4">
                                <i class="fas fa-server text-gray-400"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-white">{{ $server['name'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-400 font-mono">{{ $server['id'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $status['color'] }} text-white">
                                <i class="{{ $status['icon'] }} mr-1"></i>
                                @if($server['status'] === 'online')
                                    Online
                                @elseif($server['status'] === 'error')
                                    Error
                                @elseif($server['status'] === 'outage')
                                    Ausfall
                                @else
                                    Wartungsarbeiten
                                @endif
                            </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-16 bg-gray-800 rounded-full h-2 mr-2">
                                <div class="h-2 rounded-full {{ $status['color'] }}"
                                     style="width: {{ $server->calculated_uptime }}%"></div>
                            </div>
                            <span class="text-sm text-gray-400">
    {{ $server['status'] === 'online' ? '100%' : $server['uptime'] . '%' }}
</span>                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        @if($server['status'] === 'online')
                            <span class="text-gray-400">Keine Vorfälle</span>
                        @elseif($server['status'] === 'maintenance')
                            @if(!empty($server['maintenance_reason']))
                                <div class="text-purple-300 italic">{{ $server['maintenance_reason'] }}</div>
                            @else
                                <span class="text-purple-300 italic">Unbekannter Grund</span>
                            @endif
                        @else
                            <span class="text-red-400 italic">Unbekannter Vorfall</span>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-gray-800/50 px-6 py-4 border-t border-gray-800">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                    <span class="text-xs text-gray-400">Online</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></span>
                    <span class="text-xs text-gray-400">Error</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full bg-red-500 mr-2"></span>
                    <span class="text-xs text-gray-400">Ausfall</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full bg-purple-500 mr-2"></span>
                    <span class="text-xs text-gray-400">Wartungsarbeiten</span>
                </div>
            </div>
            <div class="text-xs text-gray-500">
                Letzte Aktualisierung: {{ \Carbon\Carbon::parse(\App\Models\Server::max('last_checked_at'))->format('d.m.Y H:i') }} Uhr
            </div>
        </div>
    </div>
</div>

<div class="mt-12 bg-gray-900/50 border border-gray-800 rounded-xl p-8 shadow-xl" data-aos="fade-up">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/3 flex justify-center">
            <div class="bg-gradient-to-br from-purple-900/20 to-blue-900/20 rounded-full p-6">
                <i class="fas fa-history text-6xl text-purple-500"></i>
            </div>
        </div>
        <div class="md:w-2/3">
            <h3 class="text-2xl font-bold text-white mb-4">Historische Statistik</h3>
            <p class="text-gray-400 mb-6">
                Unsere Server haben in den letzten 30 Tagen eine durchschnittliche Verfügbarkeit von 99,4% erreicht.
                Bei Problemen arbeiten unser Team rund um die Uhr an Lösungen, um die bestmögliche Erfahrung zu bieten.
            </p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-white mb-1">99.8%</div>
                    <div class="text-xs text-gray-400">Durchschn. Uptime</div>
                </div>
                <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-white mb-1">4</div>
                    <div class="text-xs text-gray-400">Ausfälle (30 Tage)</div>
                </div>
                <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-white mb-1">12 min</div>
                    <div class="text-xs text-gray-400">Durchschn. Behebungszeit</div>
                </div>
                <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-white mb-1">24/7</div>
                    <div class="text-xs text-gray-400">Support Verfügbarkeit</div>
                </div>
            </div>
        </div>
    </div>
</div>
