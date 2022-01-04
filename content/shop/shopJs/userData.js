import { getLocalStorage, setLocalStorage } from "./storage.js";

const userData = {
    _cartListData: getLocalStorage('cartList'),

    get cartList() {
        return this._cartListData;
    },

    set cartList(id) {
        let object = this._cartListData.find(item => item.id === id);
        if (!object) {
            object = {
                id,
                count: 1,
                size: []
            }
            this._cartListData.push(object);
        }
        setLocalStorage('cartList', this.cartList);
    },

    // Смена размера одежды
    set changeSizeCartList(itemCart) {
        let object = this._cartListData.find(item => item.id === itemCart.id);
        object.size.push(itemCart.size);
        setLocalStorage('cartList', this.cartList);
    },

    // Получаем предыдущуй оазмер одежды
    set sizeCartList(id) {
        let object = this._cartListData.find(item => item.id === id);
        console.log(object.size)
    },

    // Колличество одежды для заказа
    set changeCountCartList(itemCart) {
        let object = this._cartListData.find(item => item.id === itemCart.id);
        object.count = itemCart.count;
        setLocalStorage('cartList', this.cartList);
    },

    set deleteItemCart(idd) {
        let index = -1;
        this.cartList.forEach((item, i) => {
            if (item.id === idd) {
                index = i;
            }
        });
        this.cartList.splice(index, 1);
        setLocalStorage('cartList', this.cartList);
    }
}

export default userData;