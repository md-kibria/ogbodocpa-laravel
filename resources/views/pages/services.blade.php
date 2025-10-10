<x-page 
    :title="$page->name" 
    :description="$page->description" 
    :keywords="$page->seo_keywords" 
    :seodes="$page->seo_description" 
    :count="count($services)">


    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

        @foreach ($services as $item)
            <article
                class="overflow-hidden rounded-lg border border-gray-100 bg-slate-100 shadow-md hover:shadow-lg transition-all">
                <div class="h-56 w-full overflow-hidden">
                    <img src="{{ asset('/storage/' . $item->image) }}" alt="{{ $item->title }}"
                        class="h-56 w-full object-cover transform transition-transform duration-500 hover:scale-110" />
                </div>

                <div class="p-4 sm:p-6">
                    <a href="{{ route('service', $item->slug) }}">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $item->title }}
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                        {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($item->description)), 40) }}
                    </p>

                    <a href="{{ route('service', $item->slug) }}"
                        class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                        Find out more

                        <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                            &rarr;
                        </span>
                    </a>
                </div>
            </article>
        @endforeach

    </div>
    <div class="text-white bg-white w-full py-4">
        {{ $services->links('pagination::tailwind') }}
    </div>
</x-page>
