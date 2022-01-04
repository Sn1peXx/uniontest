export const getGoods = {
    url: '../../../assets/db/shop.json',
    get(data) {
        fetch(this.url)
            .then(res => res.json())
            .then(data);
    },

    // Посик по категориям
    category(callback) {
        this.get(data => {
            const result = data
            callback(result);
        });
    },

    // Конкретный товар
    item(value, callback) {
        this.get(data => {
            const result = data.find(item => item.id === value);
            callback(result);
        });
    },

    cartList(cart, callback) {
        this.get(data => {
            const result = data.filter(item => cart.some(obj => obj.id === item.id));
            callback(result);
        });
    }

}