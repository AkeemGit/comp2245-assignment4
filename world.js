document.addEventListener("DOMContentLoaded", function(){
    const country = document.getElementById("country");
    const button = document.getElementById("lookup");
    const resultDiv = document.getElementById("result");


    button.addEventListener("click", function(){
        const value = country.value.trim();
        let url = "world.php?ajax=1";
         if (value !== "") {
            url += `&country=${encodeURIComponent(value)}`;
        }

        fetch(url)
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = `<ul>${data}</ul>`;
            })
            .catch(err => console.error(err));
    });
});