<div id="{{ $id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold">{{ $title }}</h2>
            <button onclick="closeModal('{{ $id }}')" class="text-red-500 text-2xl font-bold">&times;</button>
        </div>

        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('flex');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.getElementById(id).classList.remove('flex');
    }
</script>
