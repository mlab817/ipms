@forelse($encoders as $encoder)
    <li class="autocomplete-item"
        role="option" data-autocomplete-value="{{ $encoder->username }}">
        {{ $encoder->office->acronym .' - '. $encoder->full_name }} ({{ '@' . $encoder->username }})
    </li>
@empty
    <li class="autocomplete-item"
        role="option"
        aria-disabled="true">
        No user found. Try again.
    </li>
@endforelse