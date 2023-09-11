const typeFilterForm = document.getElementById("type-filter");
const typeFilterSelect = typeFilterForm.querySelector(".form-select");

typeFilterSelect.addEventListener("change", () => {
    typeFilterForm.submit();
});
