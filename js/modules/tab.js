const header = document.querySelector('.block'),
      tab = document.querySelectorAll('.block__item'),
      content = document.querySelectorAll('.tab__item');
      

const hideTabContent = () => {
    content.forEach(item => {
        item.style.display = 'none'
    });

    tab.forEach(item => {
        item.classList.remove('active__lesson');
    });
}

showTabContent = (i = 0) => {
    content[i].style.display = 'block';
    tab[i].classList.add('active__lesson');
}

hideTabContent();
showTabContent();


header.addEventListener('click', e => {
    const target = e.target;

    tab.forEach((item, i) => {
        if (target == item || target.parentNode == item) {
            hideTabContent();
            showTabContent(i);
        }
    });
})
