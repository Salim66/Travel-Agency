@php
    $seo = \App\Models\Seo::findOrFail(1);
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::to($seo->favicon) }}">

    <title>Anova Tours and Travels - Dashboard</title>

    @include('backend.layouts.partials.styles')

</head>
