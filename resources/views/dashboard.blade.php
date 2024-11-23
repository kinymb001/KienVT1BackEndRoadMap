<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Quick Access Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">Quick Access</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="/categories" class="block bg-blue-500 text-white text-center py-4 rounded shadow hover:bg-blue-600">
                            Manage Categories
                        </a>
                        <a href="/users" class="block bg-blue-500 text-white text-center py-4 rounded shadow hover:bg-blue-600">
                            Manage Users
                        </a>
                        <a href="{{ route('posts.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded shadow hover:bg-blue-600">
                            Manage Posts
                        </a>
                    </div>
                </div>
            </div>

            <!-- Post Management Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">Post Management</h2>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-gray-700">View and manage all posts in the system.</p>
                        <a href="{{ route('posts.create') }}" class="bg-green-500 text-white py-2 px-4 rounded shadow hover:bg-green-600">
                            Create New Post
                        </a>
                    </div>
                    <a href="{{ route('posts.index') }}" class="block bg-gray-500 text-white text-center py-4 rounded shadow hover:bg-gray-600">
                        View All Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
