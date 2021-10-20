@foreach($children as $child)
    <div class="form-checkbox ml-4 my-0">
        <label for="pdp_indicators_{{ $child->id }}" class="f5">
            <input type="checkbox" name="pdp_indicators[]" value="{{ $child->id }}"
                   id="pdp_indicators_{{ $child->id }}"
                   @if(in_array($child->id, $selected)) checked @endif>
            {{ $child->name }}
        </label>
    </div>

    @if(count($child->children))
        <div class="ml-4">
            @include('projects.partials.child', ['children' => $child->children])
        </div>
    @endif
@endforeach