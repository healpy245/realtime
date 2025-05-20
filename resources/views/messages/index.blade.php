<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="messages" class="space-y-4">
                        <!-- Messages will be dynamically added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Listen for new messages
        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                console.log('Message received:', e.message);
                const messagesDiv = document.getElementById('messages');
                const messageElement = document.createElement('div');
                messageElement.className = 'bg-gray-100 p-4 rounded-lg';
                messageElement.textContent = e.message;
                messagesDiv.appendChild(messageElement);
                
            });
    </script>
    @endpush
</x-app-layout> 