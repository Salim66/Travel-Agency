@php
    $seo = \App\Models\Seo::findOrFail(1);
@endphp
<head>
    <title>{{ $seo->meta_title }}</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="keyword" content="{{ $seo->meta_keyword }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <!-- Google Analytics -->
    <script>
        {{ $seo->google_analytics }}
    </script>

    @include('frontend.layouts.partials.styles')
</head>
