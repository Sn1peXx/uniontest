import { getGoods } from './getData.js';

// Генерация главной страницы
const generateGoodsPage = () => {
    const mainAct = document.querySelector(".main_act");

    const generateCard = (data) => {
        mainAct.textContent = "";

        data.forEach((item) => { 
            mainAct.insertAdjacentHTML("afterbegin", 
                `<div class="col-lg-4 col-sm-12 col-xs-12 item">
                    <a href="card.html#${item.id}" style="text-decoration: none;">
                        <img src=${item.img[0]} width="200px" alt=${item.name}>
                        ${item.count > 0 ? '' : `<div class="out_of_stock">OUT OF STOCK</div>`}
                        <div class="name-product">${item.name}</div>
                        <div class="price">${item.price}$</div>
                    </a>
                </div>`
            );
        });
    };

    if (location.pathname.includes('start-page.html')) {
        getGoods.category(generateCard);
    }
    
};

export default generateGoodsPage;
