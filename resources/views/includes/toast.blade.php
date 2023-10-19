@if (session('toast-message'))
    <div class="fixed bottom-0 right-0 p-16 z-10">
        <div id="liveToast" class="bg-gray-950 bg-opacity-60 backdrop-blur-md rounded-lg shadow-2xl w-80 text-white">
            <div class="flex items-center justify-between px-6 py-3 bg-neutral-950 bg-opacity-90 rounded-t-lg">
                <div class="flex items-center space-x-3">
                    <i class="fa-regular fa-circle-check mr-5 text-green-600"></i>
                    <span class="font-bold">Ristorante ai Murazzi</span>
                </div>
                <span class="text-xs">Ora</span>
                <button type="button" class="ml-3 focus:outline-none" data-bs-dismiss="toast" aria-label="Close">
                    <svg class="w-4 h-4 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697L8.183 10 5.152 6.849a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697L11.819 10l2.529 2.849a1.2 1.2 0 0 1 0 1.697z" />
                    </svg>
                </button>
            </div>
            <div class="px-6 py-3 text-center">
                {{ session('toast-message') }}
            </div>
        </div>
    </div>
    <script>
        const toast = document.getElementById('liveToast');
        setTimeout(() => {
            toast.style.opacity = 0;
            setTimeout(() => {
                toast.style.display = 'none';
            }, 1000);
        }, 5000);
    </script>
@endif
