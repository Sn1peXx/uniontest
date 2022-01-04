import { getGoods } from './getData.js';
import userData from './userData.js';

// Генерация отдельного предмена
const generateItemPage = () => {

    const renderCard = ({category, name, price, id, img, desc, tagline, sex, material}) => {

        const cardCategory = document.querySelector('.card-category');
        const cardBig = document.querySelector('.card_main-img');
        const cardSingle = document.querySelector('.card_single');
        const cardName = document.querySelector('.card_name');
        const cardPrice = document.querySelector('.card_price');
        const cardTagline = document.querySelector('.card_tagline');
        const cardDescription = document.querySelector('.card_description');
        const cardSex = document.querySelector('.card_sex');
        const cardMaterial = document.querySelector('.card_material');
        const cardAddCard = document.querySelector('.card_add-card');
        const select = document.querySelector('.card_standard-select');
        const cardModal = document.querySelector('.card_modal');
        const cardModalText = document.querySelector('.card_modal-text');
        const selectSize = document.querySelector('.card_select');
        

        cardBig.textContent = '';
        cardBig.insertAdjacentHTML('beforebegin', `
            <img src="${img[0]}" width="350px" alt="" class="card_big">
        `);

        cardAddCard.dataset.idd = id;
        cardCategory.textContent = category;
        cardName.textContent = name;
        cardPrice.textContent = price + '$';
        cardTagline.textContent = tagline;
        cardDescription.textContent = desc;
        cardSex.textContent = sex;
        cardMaterial.textContent = material;

        selectSize.style.display = 'block';

        // Кнопка добавления первого предмета
        cardAddCard.addEventListener('click', (e) => {
            cardAddCard.style.cssText = `background-color: rgb(0, 122, 255); transition: .4s ease-in-out;`
            cardModal.style.cssText = `
                display: block;
                animation: fixedmenu 1s forwards;
            `;
            cardModalText.textContent = 'Предмет добавлен';

            setTimeout(() => {
                cardAddCard.style.cssText = `background-color: rgb(0, 0, 0); transition: .4s ease-in-out;`;
                cardModal.style.cssText = `
                display: none;
                animation: fixedmenuHide 1s forwards;
            `;
            }, 3000);

            // Получаем размер одежды и записываем в localStorage
            const size = select.value;
            userData.cartList = id;
            userData.changeSizeCartList = {id: e.target.dataset.idd, size: [size]};
        });

    }

    if (location.hash) {
        getGoods.item(location.hash.substring(1), renderCard);
    }
}

export default generateItemPage;