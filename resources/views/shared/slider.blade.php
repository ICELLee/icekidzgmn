@php
    use App\Models\Slide;

    $pageKey = match (Route::currentRouteName()) {
        'home' => 'home',
        'team' => 'team',
        'cooperation' => 'cooperation',
        'timeline' => 'timeline',
        'concept' => 'concept',
        'server-status' => 'serverstatus',
        default => 'home', // fallback
    };

    $slides = Slide::where('is_active', true)
        ->where('page', $pageKey)
        ->orderBy('id')
        ->get()
        ->map(fn($s) => [
            'title' => $s->title,
            'description' => $s->description,
            'button' => $s->button,
            'link' => $s->link,
            'image' => 'storage/' . $s->image,
        ]);
@endphp


<div class="relative h-screen w-full overflow-hidden">
    <!-- Slider Backgrounds -->
    <div class="absolute inset-0 z-0">
        @foreach($slides as $slide)
            <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 ease-in-out opacity-0"
                 style="background-image: url('{{ asset($slide['image']) }}');"
                 data-slide>
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
        @endforeach
    </div>

    <!-- Slider Content -->
    <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
        <div class="max-w-4xl mx-auto">
            @foreach($slides as $slide)
                <div class="absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-1000 ease-in-out" data-slide-content>
                    <div class="text-center px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400" data-aos="fade-down">
                            {{ $slide['title'] }}
                        </h1>
                        <p class="text-xl md:text-2xl mb-8 text-gray-300 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                            {{ $slide['description'] }}
                        </p>
                        <div data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ $slide['link'] }}" class="inline-block px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30 font-medium">
                                {{ $slide['button'] }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Slider Dots -->
    <div class="absolute bottom-10 left-0 right-0 z-10 flex justify-center space-x-2">
        @foreach($slides as $index => $slide)
            <button class="w-3 h-3 rounded-full bg-white/30 hover:bg-white/50 transition-all duration-300"
                    data-slide-dot
                    data-slide-index="{{ $index }}"></button>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('[data-slide]');
        const slideContents = document.querySelectorAll('[data-slide-content]');
        const dots = document.querySelectorAll('[data-slide-dot]');
        let currentSlide = 0;
        const slideCount = slides.length;

        // Initialize first slide
        slides[0].style.opacity = 1;
        slideContents[0].style.opacity = 1;
        dots[0].classList.add('bg-white');

        // Auto slide change
        const slideInterval = setInterval(nextSlide, 5000);

        function nextSlide() {
            goToSlide((currentSlide + 1) % slideCount);
        }

        function goToSlide(index) {
            // Fade out current slide
            slides[currentSlide].style.opacity = 0;
            slideContents[currentSlide].style.opacity = 0;
            dots[currentSlide].classList.remove('bg-white');

            // Update current slide
            currentSlide = index;

            // Fade in new slide
            slides[currentSlide].style.opacity = 1;
            slideContents[currentSlide].style.opacity = 1;
            dots[currentSlide].classList.add('bg-white');
        }

        // Add click handlers for dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval);
                goToSlide(index);
            });
        });
    });
</script>
