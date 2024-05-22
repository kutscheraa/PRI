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

$inputClass = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline";
?>

<style>
  body {
    background: #BA8B02;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #181818, #BA8B02);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to left, #181818, #BA8B02); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background-attachment: fixed;
  }

  p {
    margin-bottom: .6em;
  }
</style>

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
    <form name="registerForm" class="bg-gray-100 shadow-2xl rounded px-8 pt-6 pb-8 mb-4" method="POST">
        <input type="hidden" name="akce" value="register">
        <div class="font-bold text-center mb-4">
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
            <input class="bg-stone-900 text-white font-bold rounded py-2 px-4" type="submit" value="Register" />
        </div>
        <div class='flex justify-center'>
            <a href="login.php" class="text-red-600 mt-4">Already have an account?</a>
    </div>
    </form>
</div>
<script>
    document.registerForm.addEventListener('submit', onSubmit)
</script>

<?php require INC . '/html-end.php';