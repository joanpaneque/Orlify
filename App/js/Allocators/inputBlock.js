export default function inputBlock() {
    const inputBlocks = document.querySelectorAll('.inputBlock');

    let focused = false;

    inputBlocks.forEach(inputBlock => {
        const input = inputBlock.querySelector('input');
        const label = inputBlock.querySelector('label');

        input.addEventListener('focus', () => {
            label.classList.add('active');
        });

        input.addEventListener('blur', () => {
            if (input.value === '') {
                label.classList.remove('active');
            }
        });

        if (input.value === "" && !focused) {
            input.focus();
            focused = true;
        }
    });

    if (!focused) {
        inputBlocks[0].querySelector('input').focus();
    }
}