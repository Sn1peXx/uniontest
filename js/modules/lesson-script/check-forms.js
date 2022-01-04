const checkForm = (areaSelector, saveBtnSelector, resetBtnSelector, modalSelector) => {

    const area = document.querySelector(areaSelector),
          saveBtn = document.querySelector(saveBtnSelector),
          resetBtn = document.querySelector(resetBtnSelector),
          modalBody = document.querySelector(modalSelector);


    document.addEventListener("DOMContentLoaded", () => {

    saveBtn.disabled = true;

    area.addEventListener("input", () => {
        if (area.value.replace(/ /g, "").length) {
            showSaveBtn(saveBtn);
        } else {
            hideSaveBtn(saveBtn);
        } 
    });

    saveBtn.addEventListener("click", e => {
        e.preventDefault();
        sendUserData();
    });

    // Очищение area по нажатию кнопки
    resetBtn.addEventListener("click", () => {
        clearArea(area);
        hideSaveBtn(saveBtn);
    });
    
    // Разблокировка кнопки при введение данных в area
    const showSaveBtn = (num) => {
        num.classList.add("btn-primary");
        num.classList.remove("btn-outline-primary");
        num.disabled = false;
    };
    
    // Блокировка кнопки при очищении area
    const hideSaveBtn = (num) => {
        num.classList.add("btn-outline-primary");
        num.classList.remove("btn-primary");
        num.disabled = true;
    };
    
    const clearArea = (num) => {
        num.value = "";
    };

    // Нажатие на кнопку отправки
    const sendUserData = () => {
        modalBody.innerHTML = `Спасибо, ваше сочинение отправлено на проверку`;

        document.querySelector('.save-test').style.display = 'none';
        document.querySelector('.close-test').style.display = 'block';
    }

    });
}


checkForm('.area7', '.btn-save4', '.btn-reset4', ".modal-body-writing");
checkForm('.area8', '.btn-save5', '.btn-reset5', ".modal-body-writing");
checkForm('.area9', '.btn-save6', '.btn-reset6', ".modal-body-independent");
checkForm('.area7', '.btn-save4', '.btn-reset4', ".modal-body-writing");
checkForm('.area17', '.btn-save9', '.btn-reset9', ".modal-body-writing");
checkForm('.area18', '.btn-save10', '.btn-reset10', ".modal-body-writing");
checkForm('.area19', '.btn-save11', '.btn-reset11', ".modal-body-independent");
checkForm('.area31', '.btn-save14', '.btn-reset14', ".modal-body-writing");
checkForm('.area32', '.btn-save15', '.btn-reset15', ".modal-body-independent");