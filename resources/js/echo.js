import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

import { Current } from 'current.js';
window.Current = Current;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: Current.reverb.appKey,
    wsHost: Current.reverb.host,
    wsPort: Current.reverb.port ?? 80,
    wssPort: Current.reverb.port ?? 443,
    forceTLS: (Current.reverb.scheme ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});
