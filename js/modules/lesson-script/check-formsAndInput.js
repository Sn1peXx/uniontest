import { LESSONS } from "../../../assets/db/answer.js";

const checkTwoFromsAndInput = (
    areaSelector1,
    areaSelector2,
    areaSelector3,
    areaSelector4,
    areaSelector5,
    areaSelector6,
    saveBtnSelector,
    radioBtnSelector,
    radioBtnSelector2,
    radioBtnSelector3,
    radioBtnSelector4,
	unitNumberSelector,
    listening,
    lessonType,
    modal
) => {
    const area1 = document.querySelector(areaSelector1),
        area2 = document.querySelector(areaSelector2),
        area3 = document.querySelector(areaSelector3),
        area4 = document.querySelector(areaSelector4),
        area5 = document.querySelector(areaSelector5),
        area6 = document.querySelector(areaSelector6),
        saveBtn = document.querySelector(saveBtnSelector),
        checkbox1 = document.querySelectorAll(radioBtnSelector),
        checkbox2 = document.querySelectorAll(radioBtnSelector2),
        checkbox3 = document.querySelector(radioBtnSelector3),
        checkbox4 = document.querySelector(radioBtnSelector4),
		unitNumber = document.querySelector(unitNumberSelector),
        modalBody = document.querySelector(modal);

    document.addEventListener("DOMContentLoaded", () => {
        // Объект в который будут записываться ошибки при решении
        const objError = { 
            testError: {test1: [], test2: [], test3: [], test4: []},
            wordError: {words1: [], words2: [], words3: [], words4: [], words5: [], words6: []}
        };

        saveBtn.disabled = true;

        // Проверка на введенные символы в area
        area1.addEventListener("input", () => {
            if (area1.value.replace(/ /g, "").length) {
                showSaveBtn(saveBtn);
            } else {
                hideSaveBtn(saveBtn);
            }
        });

        // Кнопка сохранения результата
        saveBtn.addEventListener("click", (e) => {
            e.preventDefault();

            // Получние ответов теста
            let arr = { arr1: [], arr2: [], arr3: [], arr4: [] };
            let countError = 0;

            // Получние письменных ответов
            const words = { words1: [], words2: [], words3: [], words4: [], words5: [], words6: [] };
            let wordsError = 0;


            const checkCheckBox = (arr, checkbox, path, lessonPath) => {
                try {
                    // Проверка чекбокосв, если не во всех есть значнеия, то подставляем 0 (то есть неверный ответ)
                    for (let i = 0; i < checkbox.length; i++) {
                        if (checkbox[i].checked) {
                            arr.push(checkbox[i].value.toLowerCase());
                        } else {
                            arr.push((checkbox[i].value = 0));
                        }
                    }

                    arr = arr.filter((x) => isNaN(x));

                    // Проверяем ответы на тест пользователя
                    for (let i = 0; i < listening[lessonPath].length; i++) {
                        if (listening[lessonPath][i] !== arr[i]) {
                            countError++;
                            // Записываем ответы, в которых была ошибка в массив
                            path.push(i);
                        }
                    }
                } catch {}
            }
            
            checkCheckBox(arr.arr1, checkbox1, objError.testError.test1, "TEST_1");
            checkCheckBox(arr.arr2, checkbox2, objError.testError.test2, "TEST_2");
            checkCheckBox(arr.arr3, checkbox3, objError.testError.test3, "TEST_3");
            checkCheckBox(arr.arr4, checkbox4, objError.testError.test4, "TEST_4");


            const checkArea = (errorPath, words, lessonPath, area) => {
                try {
                    // записываем слова из textarea в массив
                    words.push(area.value.toLowerCase());
                    let a = words.join(",").split(",");
                    const arrayWords = a.map((val) => val.trim());

                    // Проверяем ответы из текстового поля 
                    if (arrayWords.length <= listening[lessonPath].length) {
                        const notEnoughWords = listening[lessonPath].length - arrayWords.length;
                        for (let i = 0; i < arrayWords.length; i++) {
                            if (arrayWords[i] != listening[lessonPath][i]) {
                                wordsError++;
                                // Добавление слов, в которых была допущена ошибка
                                errorPath.push(++i); // до этого было listening[lessonPath][i] то есть слово в котором допущена ошибка
                            }
                        }
                        wordsError += notEnoughWords;
                    } else {
                        for (let i = 0; i < arrayWords.length; i++) {
                            if (arrayWords[i] != listening[lessonPath][i]) {
                                wordsError++;
                                errorPath.push(++i);
                            }
                        }
                    } 
                } catch {}
            }

            checkArea(objError.wordError.words1, words.words1, "WORDS_1", area1);
            checkArea(objError.wordError.words2, words.words2, "WORDS_2", area2);
            checkArea(objError.wordError.words3, words.words3, "WORDS_3", area3);
            checkArea(objError.wordError.words4, words.words4, "WORDS_4", area4);
            checkArea(objError.wordError.words5, words.words5, "WORDS_5", area5);
            checkArea(objError.wordError.words6, words.words6, "WORDS_6", area6);
            
            document.querySelector(".save-test").style.display = "block";
            document.querySelector(".close-test").style.display = "none";
    
            if (arr.arr1.length == 0) {
                modalBody.innerHTML = `Ошибок допущено <b>${wordsError}</b>`;
            } else {
                modalBody.innerHTML = `Количество допущенных ошибок в тесте: <b>${countError}</b><br>Слов написано неверно <b>${wordsError}</b>`;
            }
            

            const sendError = () => {
                // Отпарвяем неверные ответы на back и там записываем txt файл
                let xhr = new XMLHttpRequest();

                let stringTestError1 = '', stringTestError2 = '', stringWordsError1 = '', stringWordsError2 = '', stringWordsError3 = '';

                objError.testError.test1.map(item => stringTestError1 += item);
                objError.testError.test2.map(item => stringTestError2 += item);

                objError.wordError.words1.map(item => stringWordsError1 += item + ",");
                objError.wordError.words2.map(item => stringWordsError2 += item + ",");
                objError.wordError.words3.map(item => stringWordsError3 += item + ",");

                const unit = unitNumber.textContent;
                const type = lessonType;

                const stringTestError = "Задание 1: " + stringTestError1 + ' Задание 2: ' + stringTestError2;
                const stringWordsError = "Задание 1: " + stringWordsError1 + ' Задание 2: ' + stringWordsError2 + " Задание 3: " + stringWordsError3;

                xhr.open("GET", "../../../data/writeDatainTxt.php?b="+stringTestError+"&a="+stringWordsError+"&unit="+unit+"&type="+type, true);
                xhr.send();
            }
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
    });
};

    checkTwoFromsAndInput(".area2", ".area3", ".area4", ".area5", null, null, ".btn-save2", ".radio2", '.radio3', null, null, ".week__number", LESSONS.LISTENING_1, 'Listening', ".modal-body-listening");
    checkTwoFromsAndInput(".area6", null, null, null, null, null, ".btn-save3", ".radio4", null, null, null, ".week__number", LESSONS.READING_1, 'Reading', ".modal-body-reading");
    checkTwoFromsAndInput(".area14", ".area15", ".area16", null, null, null, ".btn-save8", null, null, null, null, ".week__number", LESSONS.READING_2, 'Reading', ".modal-body-reading");
    checkTwoFromsAndInput(".area28", ".area29", ".area30", null, null, null, ".btn-save13", null, null, null, null, ".week__number", LESSONS.READING_3, 'Reading', ".modal-body-reading");