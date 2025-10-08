<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <a {{ $attributes }} aria-current="page"
        class="{{ $active ? 'bg-gray-900 text-white' : "text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium">{{ $slot }}</a>
        
</div>
<!-- <a href="{{ route('home') }} -->