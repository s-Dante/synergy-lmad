const btnStudent = document.getElementById("btn-student");
const btnCompany = document.getElementById("btn-company");
const toggleSlider = document.getElementById("toggle-slider");
const inputIdentifier = document.getElementById("auth-identifier");

if (btnStudent && btnCompany && toggleSlider) {
    btnStudent.addEventListener("click", () => {
        toggleSlider.classList.remove("pos-company");
        toggleSlider.classList.add("pos-student");

        btnStudent.classList.add("text-active-student");
        btnCompany.classList.remove("text-active-company");

        if (inputIdentifier) {
            inputIdentifier.placeholder = "matrícula";
            inputIdentifier.type = "text";
        }
    });

    btnCompany.addEventListener("click", () => {
        toggleSlider.classList.remove("pos-student");
        toggleSlider.classList.add("pos-company");

        btnCompany.classList.add("text-active-company");
        btnStudent.classList.remove("text-active-student");

        if (inputIdentifier) {
            inputIdentifier.placeholder = "email";
            inputIdentifier.type = "email";
        }
    });
}
