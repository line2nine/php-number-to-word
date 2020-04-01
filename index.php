<html>
<head>
    <title>Number to Words</title>
</head>
<body>
<h2>Convert Your Input Number To Words</h2>
<form method="post">
    <input type="text" name="number" placeholder="Input your number">
    <input type="submit" value="Convert">
</form>
<?php
function convertNumberToWords($number)
{
    $numberList = array(
        "0" => "Zero",
        "1" => "One",
        "2" => "Two",
        "3" => "Three",
        "4" => "Four",
        "5" => "Five",
        "6" => "Six",
        "7" => "Seven",
        "8" => "Eight",
        "9" => "Nine",
        "10" => "Ten",
        "11" => "Eleven",
        "12" => "Twelve",
        "13" => "Thirteen",
        "14" => "Fourteen",
        "15" => "Fifteen",
        "16" => "Sixteen",
        "17" => "Seventeen",
        "18" => "Eighteen",
        "19" => "Nineteen",
        "20" => "Twenty",
        "30" => "Thirsty",
        "40" => "Forty",
        "50" => "Fifty",
        "60" => "Sixty",
        "70" => "Seventy",
        "80" => "Eighty",
        "90" => "Ninety",
        "100" => "Hundred",

    );
    if ($number > 999) {
        return "out of ability";
    }
    if ($number < 21) {
        return $numberList[$number];
    } else if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        $value = $numberList[$tens];
        if ($units) {
            return $value . " " . $numberList[$units];
        } else {
            return $numberList[$tens];
        }
    } else if ($number < 1000) {
        $hundred = floor($number / 100);
        $remainder = $number % 100;
        $value1 = $numberList[$hundred] . " " . $numberList["100"];
        if ($remainder) {
            return $value1 . " and " . convertNumberToWords($remainder);
        } else {
            return $value1;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    echo "Your number: " . $number;
    echo "<br>";
    echo "<br>";
    echo "Can read by: " . convertNumberToWords($number);
}
?>
</body>
</html>