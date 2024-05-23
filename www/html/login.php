<?php // přihlášení uživatele
require '../prolog.php';
require INC . '/db.php';
require INC . '/html-begin.php';

switch (@$_POST['akce']) {
    case 'login':
        if (authUser($jmeno = @$_POST['jmeno'], @$_POST['heslo']))
            setJmeno($jmeno);
        break;

    case 'logout':
        setJmeno();
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

        <?php if (!isUser()) { ?>
            // inputs
            let { jmeno, heslo } = this.elements

            // trim and check
            if ((jmeno.value = jmeno.value.trim()).length < 3) {
                alert('Username is too short')
                return
            }

            // trim and check
            if ('heslo' == (heslo.value = heslo.value.trim())) {
                alert('Password cant be password')
                return
            }
        <?php } ?>

        // continue to submit
        this.submit()
    }
</script>

<div class="flex flex-direction-column justify-center m-12 mt-40">
    <form name="loginForm" class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 px-8 pt-6 pb-8 mb-4" method="POST">
        <input type="hidden" name="akce" value="<?= isUser() ? 'logout' : 'login' ?>">
        <?php if (!isUser()) { ?>
            <div class="text-2xl font-extralight text-white text-center mb-4">
                Login
            </div>
            <div class="mb-4 shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50">
                <input class="<?= $inputClass ?>" name="jmeno" type="text" placeholder="Username" required>
            </div>
            <div class="mb-4 shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50">
                <input class="<?= $inputClass ?>" name="heslo" type="password" placeholder="Password" required>
            </div>
        <?php } ?>
        <div class="flex justify-center">
        <input class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 text-white font-extralight py-2 px-4 hover:bg-white hover:text-black" type="submit"
            value="<?= isUser() ? 'Logout' : 'Login' ?>" />
        </div>  
        <div class='flex justify-center'>
            <a href="register.php" class="text-white font-extralight mt-4">Dont have an account?</a>
        </div>  
    </form>
</div>
<script>
    document.loginForm.addEventListener('submit', onSubmit)
</script>

<?php require INC . '/html-end.php';