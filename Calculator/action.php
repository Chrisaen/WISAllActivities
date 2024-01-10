<!DOCTYPE html>
<html>
<head>
    <title>Calculator - Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator-result {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
        }
        p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="calculator-result">
        <h1>Calculator - Result</h1>
        <?php
        if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operator'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];

            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Division by zero is not allowed";
                    }
                    break;
                default:
                    $result = "Invalid operator";
            }

            echo "<p>Result: $result</p>";
        }
        ?>
    </div>
</body>
</html>
