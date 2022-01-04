const checkPassword = (inputSelector) => {
    let s_letters = "qwertyuiopasdfghjklzxcvbnm",
        b_letters = "QWERTYUIOPASDFGHJKLZXCVBNM",
        digits = "1234567890",
        specials = "@!#$%^&*()_-=+;:,.?/";

    const block = document.querySelector('.block_check');
    const input = document.querySelector(inputSelector);

    input.addEventListener('keyup', () => {
        let inputVal = input.value;

        let is_s = false;
        let is_b = false;
        let is_digit = false;
        let is_spec = false;

        for (let i = 0; i < inputVal.length; i++) {
            if (!is_s && s_letters.indexOf(inputVal[i]) != -1) {
                is_s = true;
            } else if (!is_b && b_letters.indexOf(inputVal[i]) != -1) {
                is_b = true;
            } else if (!is_digit && digits.indexOf(inputVal[i]) != -1) {
                is_digit = true; 
            } else if (!is_spec && specials.indexOf(inputVal[i]) != -1) {
                is_spec = true;
            }
        }

        let rating = 0;

        if (is_s) rating++;
        if (is_b) rating++;
        if (is_digit) rating++;
        if (is_spec) rating++;

        if (inputVal.length < 8 && rating < 3) {
            block.style.height = "5px";
            block.style.width = "20%";
            block.style.backgroundColor = '#e7140d';
        } else if (inputVal.length > 8 && rating === 3) {
            block.style.height = "5px";
            block.style.width = "65%";
            block.style.backgroundColor = '#ffdb00';
        } else if (inputVal.length === 8 && rating >= 3) {
            block.style.height = "5px";
            block.style.width = "65%";
            block.style.backgroundColor = '#ffdb00';
        } else if (inputVal.length > 12 && rating === 2) {
            block.style.height = "5px";
            block.style.width = "65%";
            block.style.backgroundColor = '#ffdb00';
        } else if (inputVal.length >= 12 && rating >= 3) {
            block.style.height = "5px";
            block.style.width = "100%";
            block.style.backgroundColor = '#61ac27';
        }
        
        if (inputVal === '') {
            block.style.width = "0%";
        }
    });  
}

try {
    checkPassword('[name="password"]');
} catch {}
try {
    checkPassword('[name="new-password"]');
} catch {}

