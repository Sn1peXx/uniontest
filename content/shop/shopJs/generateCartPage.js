import { getGoods } from './getData.js';
import userData from './userData.js';

// Корзина
const generateCartPage = () => {

    if (location.pathname.includes('cart')) {

        const listGoods = document.querySelector('.list-goods');
        const subtotalPrice = document.querySelector('.subtotal-price');
        const subtotalText = document.querySelector('.subtotal-text')

        const renderCartList = (data) => {

            let totalPrice = 0;
            listGoods.textContent = '';

            data.forEach(({name, price, id, img, count}) => {
                let countUser = userData.cartList.find(item => item.id === id).count;
                let countUserSize = userData.cartList.find(item => item.id === id).size.length;
                let userSize = userData.cartList.find(item => item.id === id).size;
                let options = '';


                if (countUserSize > 1) {
                    for (let i = 1; i <= count; i++) {
                        options += `<option value=${i} ${countUserSize === i ? 'selected' : ''}>${i}</option>`
                    } 
                } else {
                    for (let i = 1; i <= count; i++) {
                        options += `<option value=${i} ${countUser === i ? 'selected' : ''}>${i}</option>`
                    } 
                }

                // Если несколько размеров, то заменяем повторяющиеся размеры на X...
                const deleteRepeatItem = (userSize) => {
                    if (userSize.length > 1) {
                        // Объединяет массивы в 1 массив
                        const arr = userSize.flat(1);

                        var names = {};
                        // Добавляем в объект кол-во и размер элементов
                        arr.forEach(item => {
                            names[item] = (names[item] || 0) + 1;
                        });

                        let output = ''
                        // Вывод кол-ва набранной одежды
                        for (var key in names) {
                            output += names[key] === 1 ? key + ', ' : names[key] +'x ' + key + ', ';
                        }

                        return output.slice(0, -2)
                    }
                }

                // Если товар есть на складе
                if (count >= countUserSize) {
                    totalPrice += countUserSize > 1  ? price * countUserSize : price * countUser
                }
               
                
                listGoods.insertAdjacentHTML('beforeend', `
                    <div class="goods">
                        <div class="cart-left">
                            <div class="center">
                                <div class="cart-show">
                                    <img class="cart-img" src="${img[0]}"
                                        width="100px" alt="${name}">
                                    <button class="btn-remove" data-idd=${id}>remove</button>
                                </div>

                                <div class="cart-row">
                                        <a href="card.html#${id}" style="text-decoration: none; color: black" class="goods-price">${name}</a>
                                    <span>(${userSize.length > 1 ? deleteRepeatItem(userSize) : userSize})</span>
                                    <div class="cart-price">
                                        <p class="price-text">PRICE</p>
                                        <b>
                                            <p class="ont-goods__price">€${price}</p>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>

                    ${count >= countUserSize ? 
                       ` <div class="cart-right">
                            <div class="goods-count">
                                <label for="standard-select" style="margin-left: 15px;">QTY</label>
                                <div class="select" style="margin-top: 10px;">
                                    <select class="standard-select" data-idd=${id}>
                                        ${options}
                                    </select>
                                </div>
                            </div>

                            <div class="total">
                                <p class="total-price">TOTAL</p>
                                <b>
                                    <p class="goods-price cart-price-all">€${countUserSize > 1 ? price * countUserSize : price * countUser}</p>
                                </b>
                            </div>
                        </div>` : `<pre style="position: relative; top: 120px; margin-left: -150px">Not enough</pre>`}
                    </div>
                `);

                 // Если товаров выбрано больше чем есть на скаладе
                if (count >= countUserSize) {
                    subtotalPrice.textContent = '€' + totalPrice;
                    subtotalText.style.display = 'block';
                } else {
                    subtotalPrice.textContent = `К сожалению, на складе нет ${name} в таком количестве.`
                    subtotalText.style.display = 'none';
                }
            });
 
           
            
        }

        listGoods.addEventListener('change' , (e) => {
            userData.changeCountCartList = {id: e.target.dataset.idd, count: +e.target.value};
            getGoods.cartList(userData.cartList, renderCartList);
        });

        listGoods.addEventListener('click', e => {
            const target = e.target;
            const btnRemove = target.closest('.btn-remove');
            userData.deleteItemCart = btnRemove.dataset.idd;
            getGoods.cartList(userData.cartList, renderCartList);
        });

        getGoods.cartList(userData.cartList, renderCartList);

    }
}

export default generateCartPage;