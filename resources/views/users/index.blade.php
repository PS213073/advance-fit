@include('front.layouts.header')

{{-- @section('IndexMain') --}}
<section class="home bg-cover" style="background-image: url({{ asset('assets/images/home.png') }})" id="home">
    <div class="home__container container grid grid-cols-1 md:grid-cols-2">
        <div class="home__data gap-8 flex flex-col">
            <h1 class="text-[2rem] leading-[140%] mb-[1rem] text-white">
                Advance-Fit
            </h1>
            <p class="home__description text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>

            <a href="{{route('front.subscription.index')}}" class="button button--flex bg-[#6E38D5] w-[15rem] justify-center hover:bg-[#221551]">
                Subscribe now<i class="ri-arrow-right-down-line button__icon"></i>
            </a>
        </div>
    </div>
</section>

<section>
    {{-- <h2 class="font-medium text-3xl text-center pb-8 pt-4">Exercises</h2> --}}
</section>

<!-- modal -->
<div class="popup-view">
    <div class="popup-card">
        <a><i class="fas fa-times close-btn"></i></a>
        <div class="product-img">
            <img class="image" src="" alt="">
        </div>
        <div class="info">
            <h2 class="name"></h2>
            <p class="description"></p>
            <span class="price"></span>
            <a href="#" class="add-cart-btn">Toevoegen &nbsp; <i class="ri-shopping-cart-line"></i></a>
        </div>
    </div>
</div>
{{-- @endsection('IndexMain') --}}

@include('front.layouts.footer')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $('.slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slider').on('mousewheel', function(e) {
        e.preventDefault();

        if (e.originalEvent.wheelDelta < 0) {
            $(this).slick('slickNext');
            // console.log('slickNext');
        } else {
            $(this).slick('slickPrev');
            // console.log('slickPrev');
        }
    });
</script>
