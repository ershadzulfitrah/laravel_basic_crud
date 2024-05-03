@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
    <path d="M1000 500c0 277-223 500-500 500S0 777 0 500 223 0 500 0s500 223 500 500zm-188 0c0-229 0-229-312-229s-312 0-312 229 0 229 312 229 312 0 312-229zM417 375l208 125-208 125V375z"></path>
</svg>
