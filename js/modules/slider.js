const sliderSwipeHandler = (slides, prev, next) => {
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
            item.style.display = 'none';
        });

        items[slideIndex - 1].style.display = "flex";  
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

}


sliderSwipeHandler('.reviews_slider', '.slider_prev', '.slider_next');