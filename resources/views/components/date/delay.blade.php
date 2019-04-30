@php
    use App\Component\DateDelay;
   
    $dateDelay = new DateDelay($timestamp);
    list($class, $label) = $dateDelay->getTemplate();
@endphp
<span class='time-{{$class}}'>{{$label}}</span>
