@include('front.layouts.header')

<section class="py-16">
    <h2 class="font-medium text-3xl text-center pb-8">Subscriptions</h2>
    <div class="px-12 w-full h-full relative grid grid-cols-2 md:grid-cols-3 sm:grid-cols-1">
        @foreach ($subscriptions as $subscription)
            <div class="w-[223px] h-[156px] md:h-full md:w-[323px] left-0 top-0 p-10 bg-[#221551] rounded-xl"
                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <div class="text-center text-white md:text-[25px] text-[18px] md:pt-0 pt-4 font-bold break-word">
                    {{ $subscription->name }}</div>
                <div class="text-center text-white md:text-[13px] py-4   text-[10px] font-normal break-word">
                    {{ $subscription->description }}</div>
                <div
                    class="text-center text-white text-[18px] md:text-[25px] pt-3 pb-8 font-normal flex flex-col items-center justify-center break-word">
                    €{{ $subscription->price }}<br />
                    <p>per maand</p>
                </div>
                <a href="{{ route('front.subscription.index') }}"
                    class="button button--flex bg-[#6E38D5] w-[15rem] justify-center hover:bg-[#221551]">
                    Subscribe now<i class="ri-arrow-right-down-line button__icon"></i>
                </a>
            </div>
        @endforeach
    </div>
</section>

@include('front.layouts.footer')
