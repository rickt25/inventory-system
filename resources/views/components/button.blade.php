@props(['color' => 'blue'])

<button 
    {{ $attributes->merge([
        'type' => 'submit', 
        'class' => 'rounded px-4 py-1 bg-'.$color.'-600 text-white transition-colors hover:bg-'.$color.'-700'
        ]) }}>

    {{ $slot }}
</button>
