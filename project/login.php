<?php
/* browseall.php */

/* include functions */
require_once(dirname(__FILE__) . '/functions/database.php');
require_once(dirname(__FILE__) . '/commons/header.php');

if (isset($_GET['do_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $exist = getUser($username, $password);
    if ($exist) {
        die();
        $lifetime = time() + 120;
        $logged = isset($_SESSION['logged']) ? $_SESSION['logged'] : 'test';
        $_SESSION['logged'] = $logged;
        header('location: http://localhost/psw2/index.php');
        exit();
    }
    else{
        echo "<a href='register.php'>Register Here!</a>";
    }
} else if (isset($_GET['logout'])) {
    unset($_SESSION['logged']);
    header('location: http://localhost/psw2/login.php');
    exit();
}
?>
<div align=center>
    <form method=post action="login.php?do_login=1" onsubmit="return checkForm(this);">
        <table>
            <tr>
                <td>username</td>
            </tr>
            <tr>
                <td><input title="Username must be between 6-15 character, and only alphabet and numeric are allowed" type="text" required pattern="[a-zA-Z0-9]{6,15}" name="username" onchange="
                        this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                           "></td>
            </tr>
            <tr>
                <td>password</td>
            </tr>
            <tr>
                <td><input title="Password must between 8-16 character." type="password" required pattern=".{8,16}" name="password" onchange="
                        this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                           "></td>
            </tr>
            <tr>
                <td><input type=submit value=login></td>
            </tr>
        </table>
    </form>
   
</div>

<?php
require_once(dirname(__FILE__) . '/commons/footer.php');
?>