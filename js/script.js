const accordion = (triggerSelector) => {
    const btns = document.querySelectorAll(triggerSelector);

    btns.forEach((btn) => {
        btn.addEventListener("click", function () {
            this.classList.toggle("active-style");
            this.nextElementSibling.classList.toggle("active-content");

            if (this.classList.contains("active-style")) {
                this.nextElementSibling.style.maxHeight =
                    this.nextElementSibling.scrollHeight + 80 + "px";
            } else {
                this.nextElementSibling.style.maxHeight = "0px";
            }
        });
    });
};

// Левый блок
const openProfileBlock = () => {
    const button = document.querySelectorAll(".servise__more"),
        content = document.querySelectorAll(".more"),
        header = document.querySelector(".ser"),
        buttonClose = document.querySelectorAll(".servise__more-close"),
        butn = document.querySelectorAll(".butn"),
        infoTab = document.querySelectorAll('.service__info')

    const showContent = (i = 0) => {
        content[i].style.display = "block";
    };

    const hideContent = () => {
        content.forEach((item) => {
            item.style.display = "none";
        });
    };

    hideContent();

    buttonClose.forEach((item) => {
        item.style.display = "none";
    });

    header.addEventListener("click", (e) => {
        const target = e.target;

        infoTab.forEach(item => {
            if (target == item || target.parentNode == item) {
                buttonClose.forEach((item) => {
                    item.style.display = "none";
                });
                button.forEach((item) => {
                    item.style.display = "block";
                });
            }
        })
       
        
        infoTab.forEach((item, i) => {
            if (target == item || target.parentNode == item) {
                if (content[i].style.display == "block") {
                    hideContent();
                } else {
                    hideContent();
                    showContent(i);
                }

                buttonClose[i].style.display = "block";
                button[i].style.display = "none";
            }
        });

        buttonClose.forEach((item, i) => {
            if (target == item || target.parentNode == item) {
                if (content[i].style.display == "block") {
                    hideContent();
                } else {
                    hideContent();
                    showContent(i);
                }

                buttonClose[i].style.display = "none";
                button[i].style.display = "block";
            }
        });
    });
};

openProfileBlock();
accordion(".accordion-heading");
