<?php
/* browseall.php */

/* include functions */
require_once(dirname(__FILE__) . '/functions/database.php');
require_once(dirname(__FILE__) . '/commons/header.php');

if (isset($_GET['do_register'])) {

    $username = $_POST['username'];
    $password = $_POST['pwd1'];
    $email = $_POST['email'];
    $_SESSION['username']=$username;
    $_SESSION['password']= $password;
    $_SESSION['email']=$email;
    $exist = getUser($username, $password);
    if (!$exist) {
        $lifetime = time() + 120;
        $logged = isset($_SESSION['logged']) ? $_SESSION['logged'] : 'test';
        $_SESSION['logged'] = $logged;
        header('location: http://localhost/psw2/seller_register.php');
        exit();
    }
    else{
        echo "Username already exist!";
    }

} else if (isset($_GET['logout'])) {
    unset($_SESSION['logged']);
    header('location: http://localhost/psw2/login.php');
    exit();
}
?>
<div align=center>
    <form method=post action="register.php?do_register=1"  onsubmit="return checkForm(this);">
        <table>
            <tr>
                <td>email</td>
            </tr>
            <tr>
                <td><input title="Email must be well format" type="email" name="email" required pattern= "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" onchange="
                        this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
                </td>
            </tr>
            <tr>
                <td>Username</td>
            </tr>
            <tr>
                <td><input title="Username must be between 6-15 character, and only alphabet and numeric are allowed" type="text" required pattern="[a-zA-Z0-9]{6,15}" name="username">
            </tr>
            <tr>
                <td>Password</td>

            </tr>
            <tr>
                <td>
                    <input title="Password must between 8-16 character" type="password" required pattern=".{8,16}" name="pwd1" onchange="
                            this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                            if (this.checkValidity())
                                form.pwd2.pattern = this.value;">
                </td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>

            </tr>
            <tr>
                <td>
                    <input title="Please enter the same Password as above" type="password" required pattern=".{8,16}" name="pwd2" onchange="
                            this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type=submit value=Register></td>
            </tr>
        </table>
    </form>
</div>
<?php
require_once(dirname(__FILE__) . '/commons/footer.php');
?>