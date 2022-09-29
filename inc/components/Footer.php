<footer class="bg-dark">
    <div class="container">
        <p class="text-white p-3 text-center mb-0">@ 2022 - <a href="#" class="text-decoration-none">FTA Travels</a>, All rights reserved.</p>
    </div>
</footer>

<script type="text/javascript">
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>