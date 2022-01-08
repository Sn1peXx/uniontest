
const sliderSwipeHandler = (slides, prev, next) => {
    document.addEventListener("DOMContentLoaded", () => {
        let slideIndex = 1;

        const items = document.querySelectorAll(slides);

        const showSlides = n => {
            if (n > items.length) {
                slideIndex = 1;
            }
            
            if (n < 1) {
                slideIndex = items.length;
            }

            items.forEach(item => {
                // item.classList.add('.animated');
                // item.style.animationDuration = '2s';
                item.style.display = 'none';
            });

            items[slideIndex - 1].style.display = "flex";  
            items[slideIndex - 1].style.justifyContent = "space-around";
        }

        showSlides(slideIndex);

        const plusSlides = n => {
            showSlides(slideIndex += n);
        }

        const prevBtn = document.querySelector(prev),
            nextBtn = document.querySelector(next);

        prevBtn.addEventListener('click', () => {
            plusSlides(-1);
        });


        nextBtn.addEventListener('click', () => {
            plusSlides(1);
        });
    })
}




sliderSwipeHandler('.reviews_slider', '.slider_prev', '.slider_next');
sliderSwipeHandler('.slider_group', '.slider_prev', '.slider_next');