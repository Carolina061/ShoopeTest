<?php
/* browseall.php */

/* include functions */
require_once(dirname(__FILE__) . '/functions/database.php');
require_once(dirname(__FILE__) . '/commons/header.php');

if (isset($_GET['do_seller_register'])) {

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];
    $ktp_number = $_POST['ktpnumber'];
    $photo_of_user = $_POST['picture'];
    $photo_of_ktp = $_POST['ktp'];
    addSeller($username, $password, $email, $ktp_number, $photo_of_user, $photo_of_ktp);
    header('location: http://shopee.co.id');
    exit();
} 
?>
<div align=center>
    <form method=post action="register.php?do_seller_register=1"  enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2"> Langkah 1</td>
            </tr>
            <tr>
                <td>Masukkan No. KTP</td>
                <td><input title="KTP number must be numeric and maximal 16 characters" type="text" required pattern="[0-9]{1,16}" name="ktpnumber"></td>
            </tr>
        </table>
        <br>
        <br>
        <table>
            <tr>
                <td colspan="2"> Langkah 2</td>
            </tr>
            <tr>
                <td colspan="2">
                    foto diri beserta KTP Anda.
                    <br>
                    Nomor KTP dan Wajah Anda harus terlihat jelas dalam foto.
                </td>

            </tr>
            <tr>
                <td>
                    <input type="file" name="file" id="picture" required />
                    <br>
                    Tambahkan Foto Anda
                </td>
                <td>
                    <input type="file" name="file" id="ktp" required />
                    <br>
                    Tambahkan Foto KTP Anda
                </td>

            </tr>
            <tr>
                <td></td>
                <td>Saya setuju dengan <a href="https://shopee.co.id/docs/3000">Syarat & Ketentuan</a> program Penjual Terpilih Shoopee</td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <button>Kirimkan</button>
                </td>
            </tr>
        </table>
        <p id="error1" style="display:none; color:#FF0000;">
            Invalid Photo of user Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
        </p>
        <p id="error2" style="display:none; color:#FF0000;">
            Maximum Photo of user  File Size Limit is 100 KB.
        </p>


        <p id="error3" style="display:none; color:#FF0000;">
            Invalid Photo of KTP Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
        </p>
        <p id="error4" style="display:none; color:#FF0000;">
            Maximum Photo of KTP  File Size Limit is 100 KB.
        </p>

        <p>
            <input name="submit" type="submit" value="Submit" id="submit" />
        </p>

    </form>
</div>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
<script>
    $('input[type="submit"]').prop("disabled", true);
    var a = 0;
//binds to onchange event of your input field
    $('#picture').bind('change', function () {
        if ($('input:submit').attr('disabled', false)) {
            $('input:submit').attr('disabled', true);
        }
        var ext = $('#picture').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg']) == -1) {
            $('#error1').slideDown("slow");
            $('#error2').slideUp("slow");
            a = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 100000) {
                $('#error2').slideDown("slow");
                a = 0;
            } else {
                a = 1;
                $('#error2').slideUp("slow");
            }
            $('#error1').slideUp("slow");
            if (a == 1) {
                $('input:submit').attr('disabled', false);
            }
        }
    });


    $('#ktp').bind('change', function () {
        if ($('input:submit').attr('disabled', false)) {
            $('input:submit').attr('disabled', true);
        }
        var ext = $('#ktp').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg']) == -1) {
            $('#error3').slideDown("slow");
            $('#error4').slideUp("slow");
            a = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 100000) {
                $('#error4').slideDown("slow");
                a = 0;
            } else {
                a = 1;
                $('#error4').slideUp("slow");
            }
            $('#error3').slideUp("slow");
            if (a == 1) {
                $('input:submit').attr('disabled', false);
            }
        }
    });


</script>
<?php
require_once(dirname(__FILE__) . '/commons/footer.php');
?>