<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ここにタイトル</title>
    <!-- <link href="css/reset.css" rel="stylesheet" type="text/css"> -->
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    $organization = $affiliation = $administrator = $zip31 = $zip32 = $address = $phone = $email = $password = '';
    $organizationErr = $affiliationErr = $administratorErr = $zip31Err = $zip32Err = $addressErr = $phoneErr = $emailErr = $passwordErr = '';
    $content = '';
    if (isset($_POST['Submit'])) {
        $organization = $_POST['organization'];
        $affiliation = $_POST['affiliation'];
        $administrator = $_POST['administrator'];
        $zip31 = $_POST['zip31'];
        $zip32 = $_POST['zip32'];
        $address = $_POST['address'];
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = $_POST['password'];

        // Validate for organization
        if (empty($organization)) {
            $organizationErr = '団体名は必ず指定してください。 ';
        }
        // Validate for affiliation
        if (empty($affiliation)) {
            $affiliationErr = '所属は必ず指定してください。';
        }
        // Validate for administrator
        if (empty($administrator)) {
            $administratorErr = '管理者名は必ず指定してください。';
        }
        // Validate for zip31
        if (empty($zip31)) {
            $zip31Err = '郵便番号は必ず指定してください。';
        }
        // Validate for zip32
        if (empty($zip32)) {
            $zip32Err = '郵便番号は必ず指定してください。';
        }
        // Validate for address
        if (empty($address)) {
            $addressErr = 'ご住所は必ず指定してください。';
        }
        // Validate for phone
        if (empty($phone)) {
            $phoneErr = '電話番号は必ず指定してください。';
        }
        // Validate for email
        if (empty($email)) {
            $emailErr = 'メールアドレスは必ず指定してください.';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'email không đúng định dạng';
        }
        // Validate for password
        if (empty($password)) {
            $passwordErr = 'パスワードは必ず指定してください。';
        }
    }
    ?>
    <header id="header">
    </header>
    <div class="container">
        <div class="breadcrumbs">
            パンくずリスト > <a href="">パンくずリスト</a>
        </div>
    </div>
    <main>
        <form action="" method="POST">
            <section>
                <div class="section_header">
                    <h2 class="section_title">お客様登録</h2>
                </div>
                <div class="container">
                    <div class="form_frame">
                        <div class="form_box">
                            <div class="form_headline">
                                商品引渡し先
                            </div>
                            <label class="side_label">
                                <input type="radio" name="destination" value="company" checked>会社
                            </label>
                            <label class="side_label">
                                <input type="radio" name="destination" value="school">学校
                            </label>
                            <label class="side_label">
                                <input type="radio" name="destination" value="home">自宅
                            </label>
                        </div>
                        <!-- 会社･勤務先フォーム -->
                        <div id="company_form">
                            <div class="form_box">
                                <div class="form_headline">
                                    団体名
                                </div>
                                <input type="text" name="organization" placeholder="株式会社〇〇"
                                    class="<?= $organizationErr ? 'input-error' : '' ?>" value="<?= $organization ?>">
                                <?= $organizationErr ? "<span class='smg-error'>{$organizationErr}</span>" : '' ?>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    所属（引渡し先）
                                </div>
                                <input type="text" name="affiliation" placeholder="営業部"
                                    class="<?= $affiliationErr ? 'input-error' : '' ?>" value="<?= $affiliation ?>">
                                <?= $affiliationErr ? "<span class='smg-error'>{$affiliationErr}</span>" : '' ?>>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    管理者名
                                </div>
                                <input type="text" name="administrator" placeholder="山田　太郎"
                                    class="<?= $administratorErr ? 'input-error' : '' ?>" value="<?= $administrator ?>">
                                <?= $administratorErr ? "<span class='smg-error'>{$administratorErr}</span>" : '' ?>>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    郵便番号
                                </div>
                                <div class="flex_wrap zip_frame">
                                    <div>
                                        <input type="text" name="zip31" maxlength="3" placeholder="000"
                                            class="<?= $zip31Err ? 'input-error' : '' ?>" value="<?= $zip31 ?>">
                                        <?= $zip31Err ? "<span class='smg-error'>{$zip31Err}</span>" : '' ?>>
                                    </div>
                                    <div>
                                        <input type="text" name="zip32" maxlength="4"
                                            onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');"
                                            placeholder="0000" class="<?= $zip32Err ? 'input-error' : '' ?>"
                                            value="<?= $zip32 ?>">
                                        <?= $zip32Err ? "<span class='smg-error'>{$zip32Err}</span>" : '' ?>>>
                                    </div>
                                </div>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    ご住所
                                </div>
                                <div class="pref"></div>
                                <input type="text" name="address" placeholder="〇〇町1-1　〇〇マンション301"
                                    class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>">
                                <?= $addressErr ? "<span class='smg-error'>{$addressErr}</span>" : '' ?>>>>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    電話番号
                                </div>
                                <input type="text" name="phone" placeholder="000-0000-0000"
                                    class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>">
                                <?= $phoneErr ? "<span class='smg-error'>{$phoneErr}</span>" : '' ?>>>>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    メールアドレス
                                </div>
                                <input type="email" name="email$email" placeholder="example@example.com"
                                    class="<?= $emailErr ? 'input-error' : '' ?>" value="<?= $email ?>">
                                <?= $emailErr ? "<span class='smg-error'>{$emailErr}</span>" : '' ?>>>>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    パスワード
                                </div>
                                <input type="text" name="password" placeholder="※半角英数字１５文字以内"
                                    class="<?= $passwordErr ? 'input-error' : '' ?>" value="<?= $password ?>">
                                <?= $passwordErr ? "<span class='smg-error'>{$passwordErr}</span>" : '' ?>>>>
                            </div>
                        </div>
                        <!-- 学校フォーム -->
                        <div id="school_form">
                            <div class="form_box">
                                <div class="form_headline">
                                    団体名
                                </div>
                                <input type="text" name="" placeholder="〇〇中学校">
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    所属（学年・クラス）
                                </div>
                                <input type="text" name="" placeholder="〇年〇組">
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    管理者名
                                </div>
                                <input type="text" name="" placeholder="山田太郎">
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    郵便番号
                                </div>
                                <div class="flex_wrap zip_frame">
                                    <div>
                                        <input type="text" name="zip31" maxlength="3" placeholder="000">
                                    </div>
                                    <div>
                                        <input type="text" name="zip32" maxlength="4"
                                            onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');"
                                            placeholder="0000">
                                    </div>
                                </div>
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    ご住所
                                </div>
                                <div name="pref"></div>
                                <input type="text" name="addr1" placeholder="〇〇町1-1　〇〇マンション301">
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    電話番号
                                </div>
                                <input type="text" name="" placeholder="00-0000-0000">
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    メールアドレス
                                </div>
                                <input type="email" name="" placeholder="example@example.com">
                            </div>
                            <div class="form_box">
                                <div class="form_headline">
                                    パスワード
                                </div>
                                <input type="text" name="" placeholder="※半角英数字１５文字以内">
                            </div>
                        </div>
                        <!-- 自宅フォーム -->
                        <div id="home_form">
                            自宅フォームが表示されます
                        </div>
                    </div>
                    <div class="button">
                        <div>
                            <input type="submit" class="button01" name="Submit" value="確認画面へ">
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>
    <footer id="footer">
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="script.js"></script>
    <script>
        $(function () {
            $("#header").load("header.html");
            $("#footer").load("footer.html");
        });
    </script>
</body>

</html>