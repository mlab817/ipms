@props([
    'header',
    'description' => '',
])

<div class="color-bg-subtle">
    <div class="border-bottom">
        <div class="container-lg d-flex flex-justify-between py-6">
            <div class="flex-auto">
                <h1 class="h1">{{ $header }}</h1>
            </div>
        </div>
        {{ $slot }}
    </div>
</div>
