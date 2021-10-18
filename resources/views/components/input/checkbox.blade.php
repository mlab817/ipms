@props([
    'options' => [],
    'name' => '',
    'selected' => []
])

@foreach($options as $option)
<div class="form-checkbox my-0">
    <label>
        <input type="checkbox" value="{{ $option->id }}" @if(in_array($option->id, $selected)) checked @endif aria-describedby="{{ str_replace('[]', '', $name) . '-' . $option->id }}" >
        {{ $option->name }}
    </label>
    @if($option->description)
    <p class="note" id="{{ str_replace('[]', '', $name) . '-' . $option->id }}">
        {{ $option->description }}
    </p>
    @endif
</div>
@endforeach