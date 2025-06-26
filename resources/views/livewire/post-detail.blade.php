<main class="flex-grow container mx-auto py-10 px-4 md:px-8 grid grid-cols-1 md:grid-cols-12 gap-12">
    <div class="md:col-span-8">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        <div class="text-gray-700 mb-4">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
    <div class="md:col-span-4">
        @livewire('aside')
    </div>
</main>
