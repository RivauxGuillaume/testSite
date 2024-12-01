document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the icon
        if (type === 'password') {
            this.src = 'img/eye.svg';
            this.alt = 'Show Password';
        } else {
            this.src = 'img/eye-off.svg';
            this.alt = 'Hide Password';
        }

        // Toggle the animation class
        this.classList.toggle('cross');
    });
});