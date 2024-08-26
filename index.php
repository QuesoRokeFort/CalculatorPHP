<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post">
        <input type="number" name= "num01" 
        placeholder="Numbero uno" required>
        <select name="operador">
            <option value="suma"> + </option>
            <option value="resta"> - </option>
            <option value="multiplicacion"> * </option>
            <option value="division"> / </option>
        </select>
        <input type="number" name="num02"
        placeholder="Numbero dos" required>
        <button>Calculate</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $num1= filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num2= filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);

        $operador = htmlspecialchars($_POST["operador"]);

        //check if data not null
        $errors =false;

        if(empty($num1) || empty($num2) || empty($operador)){
            echo"<p class='calc-error'> llene los numeros </p>";
            $errors = true;
        }

        if(!is_numeric($num1) || !is_numeric($num2)){
            echo"<p class='calc-error'> escriba numeros </p>";
            $errors = true;
        }

        if(!$errors){
            $valor = 0;
            switch ($operador){
                case "suma":
                    $valor =$num1 + $num2;
                    break;
                case "resta":
                    $valor = $num1 - $num2;
                    break;
                case "multiplicacion":
                    $valor = $num1 * $num2;
                    break;
                case "division":
                    $valor = $num1 / $num2;
                    break;
                default:
                echo"<p class='calc-error'> algo salio mal </p>";
            }
            echo"<p class='calc-resultado'> Resultado = " . $valor . "</p>";
        }
    }
    ?>
</body>
</html>