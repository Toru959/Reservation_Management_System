@auth
<x-event-detail-auth 
    {{-- コントローラーからコンパクトで渡ってきた値をコンポーネントに渡す時の書き方 --}}
    :属性名='$変数名' 
    :event='$event' 
    :reservablePeople='$reservablePeople'
    :isReserved='$isReserved'
/>
@endauth

@guest
<x-event-detail-guest 
    :event='$event' 
    :reservablePeople='$reservablePeople'
    :isReserved='$isReserved'
/>    
@endguest

