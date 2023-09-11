const forms = document.querySelectorAll(".delete-project-form");
const modal = document.getElementById("modal");

const modalBody = modal.querySelector(".modal-body");
const modalTitle = modal.querySelector(".modal-title");
const modalConfirmButton = modal.querySelector(".confirmation-button");

let deleteForm = null;

forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const projectName = form.getAttribute("data-project-name");

        //fill the modal field
        modalConfirmButton.innerText = "Delete";
        modalConfirmButton.classList.add("btn-danger");
        modalTitle.innerText = `Delete Project`;
        modalBody.innerText = `Are you sure you want to delete ${projectName}?`;

        deleteForm = form;
    });
});

modalConfirmButton.addEventListener("click", () => {
    if (deleteForm) deleteForm.submit();
});

modal.addEventListener("hidden.bs.modal", () => {
    modalConfirmButton.innerText = "";
    modalConfirmButton.classList.remove("btn-danger");
    modalTitle.innerText = "";
    modalBody.innerText = "";
});
