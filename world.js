document.addEventListener("DOMContentLoaded", function(){
    const countryInput = document.getElementById("country");
    const searchCountryBtn = document.getElementById("searchCountry");
    const resultDiv = document.getElementById("result");
    const searchCityBtn = document.getElementById("searchCity");


    function fetchData(lookupType) {
        const country = countryInput.value.trim();
        let url = `world.php?ajax=1&lookup=${lookupType}`;
        if (country !== "") {
            url += `&country=${encodeURIComponent(country)}`;
        }

        fetch(url)
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = data;
            })
            .catch(err => console.error(err));
    }

    searchCountryBtn.addEventListener("click", function() {
        fetchData("countries");
    });

    searchCityBtn.addEventListener("click", function() {
        fetchData("cities");
    });
});