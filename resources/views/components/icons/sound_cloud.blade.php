@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
    <path d="M1000 500c0 276-224 500-500 500S0 776 0 500 224 0 500 0s500 224 500 500zm-792 21c0-10-5-44-14-71-4-9-11-11-17-11s-13 2-17 11c-9 27-14 61-14 71 0 9 5 43 14 70 4 9 11 11 17 11s13-2 17-11c9-28 14-61 14-70zm108-4c0-13-6-95-16-140-2-6-9-11-15-11s-14 4-16 11c-10 45-16 127-16 140 0 11 7 72 15 98 3 9 9 14 17 14s14-4 17-14c8-26 14-87 14-98zm107-3c0-14-7-151-16-197-1-7-8-12-15-12s-14 5-15 12c-8 46-16 183-16 197s5 66 15 102c2 9 9 13 16 13s14-4 17-13c9-36 14-88 14-102zm448 8c0-57-46-103-103-103-14 0-27 3-40 8-8-93-86-169-181-169-24 0-44 7-64 15-8 3-10 6-10 13v327c0 6 5 11 11 12h284c57 0 103-46 103-103z"></path>
</svg>