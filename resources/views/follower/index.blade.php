<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="mb-4 text-2xl font-bold text-gray-700">User List</h1>
        <div class="overflow-hidden shadow-sm">
        @foreach($followed_ids as $followed_id)
        <div>{{$followed_id}}</div>
        @endforeach
        </div>
    </div>
</x-app-layout>