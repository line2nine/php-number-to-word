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
    $list_number = array(
        "0" => "zero",
        "1" => "one",
        "2" => "two",
        "3" => "three",
        "4" => "four",
        "5" => "five",
        "6" => "six",
        "7" => "seven",
        "8" => "eight",
        "9" => "nine",
        "10" => "ten",
        "11" => "eleven",
        "12" => "twelve",
        "13" => "thirteen",
        "14" => "fourteen",
        "15" => "fifteen",
        "16" => "sixteen",
        "17" => "seventeen",
        "18" => "eighteen",
        "19" => "nineteen",
        "20" => "twenty",
        "30" => "thirsty",
        "40" => "forty",
        "50" => "fifty",
        "60" => "sixty",
        "70" => "seventy",
        "80" => "eighty",
        "90" => "ninety",
        "100" => "hundred",
        "1000" => "thousand",
        "1000000" => "million",
        "1000000000" => "billion",
    );
    if ($number < 21) {
        return $list_number[$number];
    } else if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        $value = $list_number[$tens];
        if ($units) {
            return $value . " " . $list_number[$units];
        } else {
            return $list_number[$tens];
        }
    } else if ($number < 1000) {
        $hundred = floor($number / 100);
        $remainder = $number % 100;
        $value1 = $list_number[$hundred] . " " . $list_number["100"];
        if ($remainder) {
            return $value1 . " and " . convertNumberToWords($remainder);
        } else {
            return $value1;
        }
    } else if ($number < 1000000) {
        $thousand = floor($number / 1000);
        $remainder = $number % 1000;
        $value2 = convertNumberToWords($thousand) . " " . $list_number["1000"];
        if ($remainder) {
            return $value2 . " " . convertNumberToWords($remainder);
        } else {
            return $value2;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    echo "Your number: " .$number;
    echo  "<br>";
    echo  "<br>";
    echo "Can read by: " .convertNumberToWords($number);
}
?>
</body>
</html>