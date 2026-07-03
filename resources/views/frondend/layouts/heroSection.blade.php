<style>@keyframes slideLeftFade {
    from {
        opacity: 0;
        transform: translateX(-60px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slide-left {
    animation: slideLeftFade 0.8s ease-out forwards;
}


@keyframes slideUpFade {
    0% {
        opacity: 0;
        transform: translateY(40px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUpFade 0.8s ease-out forwards;
}

.animate-delay-1 {
    animation-delay: 0.2s;
    opacity: 0;
}

.animate-delay-2 {
    animation-delay: 0.4s;
    opacity: 0;
}

.animate-delay-3 {
    animation-delay: 0.6s;
    opacity: 0;
}

.typing::after {
    content: "|";
    display: inline-block;
    margin-left: 2px;
    animation: blink 0.8s infinite;
}

@keyframes blink {
    50% {
        opacity: 0;
    }
}
</style>


<section class="hero-section relative">
    <div class="container mx-auto px-4 py-24 md:py-32 w-full">
        <div class="max-w-lg">

           

            <h1 id="hero-title" class="text-4xl md:text-5xl font-bold text-gray-900 mb-4"></h1>


            <p id="hero-desc" class="text-lg text-gray-700 mb-8"> </p>
            <div class="flex flex-wrap gap-4 animate-slide-up animate-delay-2">
                <a
                    href="{{ route('frontend.new-arrivals') }}"
                    class="py-3 px-6 bg-green-500 text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">
                    Shop Now
                </a>

                <a
                    href="#"
                    class="py-3 px-6 bg-white text-gray-800 font-medium rounded-button border border-gray-200 hover:bg-gray-50 transition-colors whitespace-nowrap">
                    Explore Collection
                </a>
            </div>

        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const titleText = "Look Good, Feel Good";
    const descText = "Discover our latest arrivals designed for comfort and style. Premium quality that lasts.";

    const title = document.getElementById("hero-title");
    const desc = document.getElementById("hero-desc");

    let titleIndex = 0;
    let descIndex = 0;

    function typeTitle() {
        if (titleIndex < titleText.length) {
            title.innerHTML += titleText.charAt(titleIndex);
            titleIndex++;
            setTimeout(typeTitle, 100);
        } else {
            setTimeout(typeDesc, 300);
        }
    }

    function typeDesc() {
        if (descIndex < descText.length) {
            desc.innerHTML += descText.charAt(descIndex);
            descIndex++;
            setTimeout(typeDesc, 40);
        }
    }

    typeTitle();

});
</script>