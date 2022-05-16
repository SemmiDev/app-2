<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="row">
        <p style="text-align: center; font-weight: bolder;">Silahkan Login</p>
        <div class="rightcolumn">
            <div class="card">
                <form action="AuthProses.php?act=login" method="POST">
                    <table>
                        <tr>
                            <td>
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                    Email
                                </label>
                            </td>
                            <td>
                                <input type="text" name="email" id="email" placeholder="sammi@student.unri.ac.id">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">
                                    Password
                                </label>
                            </td>
                            <td>
                                <input type="password" name="password" id="password" placeholder="******************">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="scripts/captcha.php" alt="PHP Captcha">
                            </td>
                            <td>
                                <input type="text" id="captcha" placeholder="Captcha" name="captcha" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
                                    Login
                                </button>
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                                    Lupa Password?
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php include('./Layouts/Footer.php') ?>
</body>

</html>