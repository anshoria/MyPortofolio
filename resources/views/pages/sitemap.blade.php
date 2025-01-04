@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!--  created with Free Online Sitemap Generator www.xml-sitemaps.com  -->
    <url>
    <loc>{{ url('/') }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>1.00</priority>
    </url>
    <url>
    <loc>{{ url('/contact') }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ url('/about') }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ url('/katalog') }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ url('/projects') }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ url('/blog') }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>0.80</priority>
    </url>

    @foreach ($projects as $project)
    <url>
        <loc>{{ url('/projects/'. $project->id) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <priority>1.00</priority>
        </url>
    @endforeach
   
    @foreach ($articles as $article)
    <url>
        <loc>{{ url('/blog/'. $article->id) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <priority>1.00</priority>
        </url>
    @endforeach
   
    
    </urlset>