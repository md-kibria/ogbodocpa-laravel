@props([
    'site_title' => null,
    'site_description' => null,
    'logo' => null,
])
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="@yield('description', $site_description)">
<meta name="keywords" content="@yield('keywords', $site_keywords)">
<meta name="author" content="{{$site_title}}">
<title>@yield('title', $site_title) @hasSection('title')
        - {{ $site_title }}
    @endif
</title>
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ $logo }}" type="image/x-icon">
