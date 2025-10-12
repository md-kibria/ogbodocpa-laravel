<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>
    @foreach ($pages as $page)
        <url>
            <loc>{{ url($page->slug) }}</loc>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($services as $service)
        <url>
            <loc>{{ url('/services/' . $service->slug) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
