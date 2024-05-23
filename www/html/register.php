<?php // registrace uživatele
require '../prolog.php';
require INC . '/db.php';
require INC . '/html-begin.php';

switch (@$_POST['akce']) {
    case 'register':
        if (dbRegisterUser($jmeno = @$_POST['jmeno'], @$_POST['heslo'])) {
            echo "Success: User registered.";
        } else {
            echo "Error: Failed to register user.";
        }
        break;
}

// nav až po nastavení jména, aby se zobrazilo
require INC . '/nav.php';

$inputClass = "shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 w-full py-2 px-3 text-white leading-tight focus:outline-white";
?>
<div class="absolute top-0 z-[-2] h-screen w-screen bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>
<script>
    function onSubmit(e) {
        // no default submit
        e.preventDefault()

        // inputs
        let { jmeno, heslo, heslo2 } = this.elements

        // trim and check
        if ((jmeno.value = jmeno.value.trim()).length < 3) {
            alert('Username is too short')
            return
        }

        // trim and check
        if ('heslo' == (heslo.value = heslo.value.trim())) {
            alert('Password cant be "password"')
            return
        }

        // check if the passwords match
        if (heslo.value !== heslo2.value) {
            alert('Passwords do not match')
            return
        }

        // continue to submit
        this.submit()
    }
</script>

<div class="flex justify-center m-12 mt-40">
    <form name="registerForm" class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 px-8 pt-6 pb-8 mb-4" method="POST">
        <input type="hidden" name="akce" value="register">
        <div class="text-white text-2xl font-extralight text-center mb-4">
            Registration
        </div>
        <div class="mb-4">
            <input class="<?= $inputClass ?>" name="jmeno" type="text" placeholder="Username" required>
        </div>
        <div class="mb-4">
            <input class="<?= $inputClass ?>" name="heslo" type="password" placeholder="Password" required>
        </div>
        <div class="mb-4">
            <input class="<?= $inputClass ?>" name="heslo2" type="password" placeholder="Repeat password" required>
        </div>
        <div class="flex justify-center">
            <input class="text-extralight text-white shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 py-2 px-4 hover:bg-white hover:text-black" type="submit" value="Register" />
        </div>
        <div class='flex justify-center'>
            <a href="login.php" class="text-white font-extralight mt-4">Already have an account?</a>
    </div>
    </form>
</div>
<script>
    document.registerForm.addEventListener('submit', onSubmit)
</script>

<?php require INC . '/html-end.php';