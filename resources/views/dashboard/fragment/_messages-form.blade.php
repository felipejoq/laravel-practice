<!-- show messages flash -->
@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-4" role="alert">
        {{ session('success') }}
    </div>
@endif
