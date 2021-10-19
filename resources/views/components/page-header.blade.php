@props([
    'header',
    'description' => '',
])

<div class="color-bg-subtle border-bottom">
    <div class="container-lg d-flex flex-justify-between py-6">
        <div class="flex-auto">
            <h1 class="h1">{{ $header }}</h1>
            <p class="f4 color-text-secondary col-md-8">
                {{ $description }}
            </p>
        </div>
    </div>
</div>
