import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Listen for messages on the chat channel
window.Echo.channel('chat')
    .listen('MessageSent', (e) => {
        console.log('New message received:', e.message);
        // Handle the received message here
        // You can update your UI or trigger other actions
    }); 