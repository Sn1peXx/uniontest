const header = document.querySelector('.ava'),
      tab = document.querySelectorAll('.title__img');

header.addEventListener('click', e => {

    const target = e.target;
    tab.forEach(item => {
        if (target == item) {
            localStorage.ava = item.getAttribute('value');
            window.location.href="./personal-info.php"; 
        }
    });
});
