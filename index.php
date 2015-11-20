<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Preencher o nome";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Zà-úÀ-Ú ]*$/", $name)) {
            $nameErr = "Apenas letras e espaços em brancos são permitidos";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Preencher o e-mail";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de e-mail inválido";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "URL Invalido";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

//Limpeza dos dados de entrada
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .err{
                outline: 1px dashed red;
                background-color: darksalmon;
            }
        </style>
    </head>
    <body>
        <h1>Manuseio de Formulário com PHP</h1>
        <h2>Referências:</h2>
        <ul>
            <li><a href="http://www.w3schools.com/php/php_forms.asp">W3Schools</a></li>
            <li><a href="http://php.net/">Manual de PHP</a></li>

        </ul>
        <form method="post" 
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            Name: <input type="text" name="name" class="<?= strlen($nameErr) != 0 ? "err" : ""; ?>" value="<?php echo $name; ?>">
            <span class="error">* <?php echo @$nameErr; ?></span>
            <br><br>
            E-mail:
            <input type="text" name="email"  class="<?= strlen($emailErr) != 0 ? "err" : ""; ?>" value="<?php echo $email; ?>">
            <span class="error">* <?php echo @$emailErr; ?></span>
            <br><br>
            Website:
            <input type="text" 
                   name="website"
                   
                   value="<?php echo $website; ?>">
            <span class="error"><?php echo @$websiteErr; ?></span>
            <br><br>
            Comment: <textarea name="comment" rows="5" cols="40"><?= $coment; ?></textarea>
            <br><br>
            Gender:
            <input type="radio" name="gender" value="female"  class="<?= strlen($nameErr) != 0 ? "err" : ""; ?>" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                   value="female">Female>Femenino
            <input type="radio" name="gender" value="male"  class="<?= strlen($nameErr) != 0 ? "err" : ""; ?>" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                   value="female">Female>Masculino
            <span class="error">* <?php echo @$genderErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Enviar"> 

        </form>



    </body>
</html>
