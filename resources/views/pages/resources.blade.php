<x-page title="Resources"
    description="Our Services include Tax Preparation, Bookkeeping, Payroll, Business Consulting, and more. We
    provide expert financial solutions tailored to your needs." :count="count($resources)">


    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

        @foreach ($resources as $item)
            <article class="rounded-[10px] border border-gray-200 bg-white px-4 pt-12 pb-4 hover:shadow-lg transition-all">
                    <time datetime="{{ $item->created_at->format('Y-m-d') }}" class="block text-xs text-gray-500">
                        {{ $item->created_at->format('jS M Y') }}
                    </time>

                    <a href="{{ $item->url }}" target="_blank">
                        <h3 class="mt-0.5 text-lg font-medium text-gray-900 underline">
                            {{ $item->title }}
                        </h3>
                    </a>
                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                        {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($item->description)), 40) }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-1">
                        @php
                            $tags = explode(',', $item->tags);
                        @endphp

                        @foreach ($tags as $tag)
                            <span
                                class="rounded-full bg-blue-100 px-2.5 py-0.5 text-xs whitespace-nowrap text-blue-600">
                                {{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
            </article>
        @endforeach

    </div>
    <div class="text-white bg-white w-full py-4">
        {{ $resources->links('pagination::tailwind') }}
    </div>
</x-page>
