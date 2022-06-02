@if ($sortBy !== $field)
    
@elseif ($sortDirection == 'asc')
    <svg class="w-4 h-4" 
        data-darkreader-inline-stroke="" 
        fill="none" 
        stroke="currentColor" 
        style="--darkreader-inline-stroke: currentColor;" 
        viewBox="0 0 24 24" 
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
    </svg>
@else
    <svg class="w-4 h-4" 
        data-darkreader-inline-stroke="" 
        fill="none" 
        stroke="currentColor" 
        style="--darkreader-inline-stroke: currentColor;" 
        viewBox="0 0 24 24" 
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
@endif