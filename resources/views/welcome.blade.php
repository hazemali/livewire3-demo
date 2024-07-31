<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Code23 - Products marketplace</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

    @livewireStyles

</head>
<body>

<div class="w-11/12 mx-auto 4xl:w-10/12 min-w-[1024px]  mt-20 ">

    <livewire:filterbox key="filter-box"/>

    <livewire:products-list key="products-list"/>

    <livewire:pagination key="pagination"/>

    <livewire:sell-new-product key="sell-new-product"/>

</div>

</body>
</html>
