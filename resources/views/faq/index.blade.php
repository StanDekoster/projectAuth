ok

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @if(isset($f_a_q_s))
        @foreach($f_a_q_s as $faq)
            <div style="border: 3px solid rgb(24, 24, 27); margin:5px; padding:5px">
                <p>{{ $faq->question }}</p>
                <p>{{ $faq->answer }}</p>
            </div>
        @endforeach
    @endif
</div>