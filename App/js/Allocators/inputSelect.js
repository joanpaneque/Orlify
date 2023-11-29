export default function inputSelect() {
    const inputSelects = document.querySelectorAll('.inputBlock.select');

    if (inputSelects.length === 0) return;

    document.body.addEventListener("click", () => {
        inputSelects.forEach(inputSelect => {
            const selectContainer = inputSelect.querySelector('.selectContainer');
            selectContainer.classList.remove("active");
        });
    }, true);
    inputSelects.forEach(inputSelect => {
        const selectContainer = inputSelect.querySelector('.selectContainer');
        inputSelect.addEventListener("click", () => {
            selectContainer.classList.add("active");
        });

        const form = inputSelect.closest("form");
        const inputField = inputSelect.querySelector('.inputField');

        var hiddenInput = form.querySelector(`input[name="${inputField.getAttribute("inputName")}"]`);

        if (!hiddenInput) {
            hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", inputField.getAttribute("inputName"));
            const value = selectContainer.querySelector("[selected]").getAttribute("value");
            hiddenInput.setAttribute("value", value);
            form.appendChild(hiddenInput);
        }

        const selectOptions = inputSelect.querySelectorAll('.selectOption');
        selectOptions.forEach(selectOption => {
            selectOption.addEventListener("click", () => {
                inputField.value = selectOption.innerHTML;

                hiddenInput.setAttribute("value", selectOption.getAttribute("value"));

                inputField.setAttribute("value", selectOption.innerHTML);
                selectOptions.forEach(selectOption => {
                    selectOption.removeAttribute("selected");
                });
                selectOption.setAttribute("selected", "");
                setTimeout(() => {
                    selectContainer.classList.remove("active");
                });
            });
        });
    });
}