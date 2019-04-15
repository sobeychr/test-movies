@php
    $delay = $timestamp - NOW;
    $hour = 60 * 60;
    $day  = $hour * 24;

    if(!defined('DELAYS')) define('DELAYS', [
        [
            'class' => 'over',
            'label' => 'Time is up!',
            'time'  => 0,
        ],
        [
            'class' => 'very-short',
            'label' => 'Less than 15 mins',
            'time'  => $hour * .25,
        ],
        [
            'class' => 'very-short',
            'label' => 'Less than 30 mins',
            'time'  => $hour * .5,
        ],
        [
            'class' => 'short',
            'label' => 'Less than 1 hour',
            'time'  => $hour,
        ],
        [
            'cut'   => ceil($delay / $hour),
            'class' => 'medium',
            'label' => 'Less than {{replace}} hours',
            'time'  => $day,
        ],
        [
            'cut'   => ceil($delay / $day),
            'class' => 'long',
            'label' => 'About {{replace}} days',
            'time'  => $day * 14,
        ],
    ]);

    $class = '';
    $label = '';

    foreach(DELAYS as $delayEntry)
    {
        extract($delayEntry);
        if($delay < $time) {
            if(isset($cut)) {
                $label = str_replace('{{replace}}', $cut, $label);
            }
            break;
        }
    }
@endphp
<span class='time-{{$class}}'>{{$label}}</span>
