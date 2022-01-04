window.addEventListener("DOMContentLoaded", () => {
    const searchHelp = document.querySelector(".search__help"),
        search = document.querySelector(".search__control");
    let elasticItems = document.querySelectorAll(".search__link");

    window.addEventListener("click", (e) => {
        if (e.target == search) {
            searchHelp.style.display = "none";

            elasticItems.forEach(item => {
                item.style.display = 'none';
            });

        } else {
            searchHelp.style.display = "none";
        }
    });

    search.oninput = function () {
        let val = this.value.trim();
        if (val.length > 0) {
            val = val[0].toUpperCase() + val.slice(1);
        }
        searchHelp.style.display = "none";
        
        if (val != "") {
            searchHelp.style.display = "block";
            elasticItems.forEach((item) => {
                if (item.innerText.search(val) == -1) {
                    item.style.display = "none";
                } else {
                    item.style.display = "block";   
                }
            });
        } else {
            elasticItems.forEach((item) => {
                item.style.display = 'none';
            });
        }
    };

    searchHelp.addEventListener('click', () => {
        searchHelp.style.display = 'none';
        search.value = '';
    }); 
});
