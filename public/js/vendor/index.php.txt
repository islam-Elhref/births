<?php declare(strict_types=1);


/* ***      task1  1   *********    */

echo '<h1>task1 1</h1>';

/**
 * 1. create a function to calculate the age of a person from his birthday with BASIC way
 *
 * @param $birthday
 */
function calcAge($birthday)
{
    if (strtotime($birthday)) {

        $birthday = date_parse($birthday);
        $currentDate = date_parse(date("Y-m-d", time()));

        $year = $currentDate['year'] - $birthday['year'];
        $month = $currentDate['month'] - $birthday['month'];
        $day = $currentDate['day'] - $birthday['day'];

        if ($day < 0) {
            $day = 30 + $day;
            $month--;
        }

        if ($month < 0) {
            $month = 12 + $month;
            $year--;
        }

        return [
            'year' => $year,
            'month' => $month,
            'day' => $day,
        ];

    }


}

var_dump(calcAge('ساسشس'));
var_dump(calcAge('1996-9-1'));

/**
 * other get age from birthday by object date
 *
 * @param $birthday
 * @return DateInterval|false
 */
function getAge($birthday)
{
    if (strtotime($birthday)) {
        $date = new DateTime($birthday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval;
    }
}

var_dump(calcAge('ساسشس'));
var_dump(calcAge('1996-9-1'));


/* ***      task1  2   *********    */

echo '<h1>task1 2</h1>';

/**
 *
 * 2. create a function that prints the count of words in string (don't use 'str_word_count' function)
 *
 * @param string $string
 * @return int
 */
function wordCount(string $string)
{
    $wordCont = explode(' ', trim($string));
    return count($wordCont);
}

var_dump(wordCount(' iam islam ali abbass '));

/* ***      task1  3   *********    */

echo '<h1>task1 3</h1>';

/**
 * first $user get error because $user = 'mohamed' is out of function and Defined after her so i make it comment
 *
 *
 */

$user = "mohamed";
function printUser1()
{
    //  echo $user;
    $user = "ahmed";
}

printUser1();
echo $user; // print 'mohamed' who defined in glopal before function ;


/**
 *
 *
 */

$user = "mohamed"; // this is global variable
function printUser2()
{
    global $user; // this get global variable 'mohamed'
    echo $user; // print 'mohamed';
    $user = "ahmed"; // this make global varible mohamed to ahmed
}

printUser2();
echo $user; // print ahmed ;


/**
 *
 */
$user = "mohamed"; // global variable
function printUser3()
{
    static $user = "ali"; // this static variable and make variable not delete after called not useful in this case
    echo $user . "\n"; // echo ali
    global $user; // this called the global variable mohamed
    echo $user . "\n"; // echo mohamed
    $user = "ahmed"; // global variable set ahmed
}

printUser3();
echo $user; // echo ahmed ;

/* ***      task1  4   *********    */

echo '<h1>task1 4</h1>';

/**
 * with for
 *  * 4. write a function used to search about word inside array,
 * and return associative array contains the length of the matched word and the word index.
 *
 * @param string $word
 * @param $array
 */
function findWordArray(string $word, array $array)
{
    $word_array = [];
    $word = trim($word);
    if (!empty($word) && !empty($array)) {
        for ($i = 0, $ii = count($array); $i < $ii; $i++) {
            if ($array[$i] === $word) {
                $word_array[$i] = strlen($array[$i]);
            }
        }
        return !empty($word_array) ? $word_array : false;
    }
}

var_dump(findWordArray2('ahmed', ['minya' => 'ahmed', 'cairo' => 'islam', 'bani-suef' => 'ahmed']));

/**
 * with foreach
 *
 *  * 4. write a function used to search about word inside array,
 * and return associative array contains the length of the matched word and the word index.
 *
 * @param string $word
 * @param $array
 */
function findWordArray2(string $word, array $array)
{
    $word_array = [];
    $word = trim($word);
    if (!empty($word) && !empty($array)) {

        foreach ($array as $key => $value) {
            if ($value === $word) {
                $word_array[$key] = strlen($value);
            }
        }
        return !empty($word_array) ? $word_array : false;
    }
}

var_dump(findWordArray2('ahmed', ['minya' => 'ahmed', 'cairo' => 'islam', 'bani-suef' => 'ahmed']));



/* ***      task1  5 and 8   *********    */

echo '<h1>task1 5</h1>';


/**
 * 5. Write a function that represent a shopping cart contains 3 items of products,
 * each item has the following fields id, name, quantity, price
 *
 *
 * "8. edit example 5 function to return the total price of items and check if the item price is more than 1000 then make a discount for the
 * total price of the item (quantity * price). and you should check for the items count befre that, in case of the count is 0 print a warning message with the
 * following text ""cart is empty"" otherwise before print the price print the following message ""Thanks for using our service"""
 *
 */

$cart = [];
function shoppingCart(): array
{
    global $cart;
    $items = [];
    $totalPrice = 0;

    $computer = ['id' => 15, 'name' => 'computer', 'quantity' => 2, 'unitPrice' => 2500];
    $laptop = ['id' => 25, 'name' => 'laptop', 'quantity' => 1, 'unitPrice' => 5000];
    $car = ['id' => 36, 'name' => 'car', 'quantity' => 1, 'unitPrice' => 90000];

    array_push($items, $computer, $laptop, $car);

    if (!empty($items)) {

        foreach ($items as $id_item => $item) {
            if ($item['quantity'] > 0) {
                array_push($cart, $item);
                $totalPrice += $item['quantity'] * $item['unitPrice'];
            } else {
                $error_msg = "quantity of " . $item['name'] . " must be more than 0 "; // or use it as array any where
                throw new Exception($error_msg);
            }
        }
        $cart['totalPrice'] = $totalPrice;

        echo 'Thanks for using our service';
        return $cart; // all items info with totalPrice in array
    } else {
        $error_msg = "cart is empty"; // or use it as array any where
        throw new Exception($error_msg);
    }
}

var_dump(shoppingCart());


/* ***      task1  6   *********    */

echo '<h1>task1 6</h1>';


/**
 *
 * 6. write a function to sort an associative array in descending order according to the key,
 * and function to sort an array in asc order. then print each item in the array.
 *
 * @param array $array
 */
function mySortArraybyKey(array $array , $order = 'asc') : array
{

    $newArray = [];
    if (!empty($array)) {
        $keys_array = array_keys($array);
        $count =  count($array) ;

        for ($i=0 ,$ii = $count ; $i < $ii ; $i++ ){
            for ($j=0 ,$jj = $count ; $j < $jj ; $j++){
                if ($order == 'desc'){
                    if ($keys_array[$i] > $keys_array[$j]){
                        $temp = $keys_array[$i];
                        $keys_array[$i] = $keys_array[$j];
                        $keys_array[$j] = $temp;
                    }
                }else{
                    if ($keys_array[$i] < $keys_array[$j]){
                        $temp = $keys_array[$i];
                        $keys_array[$i] = $keys_array[$j];
                        $keys_array[$j] = $temp;
                    }
                }
            }
        }
        for ($i = 0 ,$ii = $count ; $i < $ii ; $i++){
            $newArray[$keys_array[$i]] = $array[$keys_array[$i]];
        }
        return $newArray;
    }
}

$arr = ['10' => 10, '1' => 20, '5' => 30, '-4' => 40];
ksort($arr); // this is built in function php and outbut the same array
var_dump($arr);
var_dump(mySortArraybyKey($arr , 'asc'));

krsort($arr); // this is built in function php and outbut the same array
var_dump($arr);
var_dump(mySortArraybyKey($arr , 'desc'));



/* ***      task1  7   *********    */

echo '<h1>task1 7</h1>';

/**
 * 7. write a function to print the factorial of given number.
 *
 *
 * @param int $num
 */
function getFactorial(int $num){
    $num = abs($num);
    $fact = 1;
    for ($i=1 ,$ii = $num ; $i <= $ii ; $i++){
        $fact *= $i;
    }

    return $fact;
}

var_dump(getFactorial(6));

/* ***      task1  9   *********    */

echo '<h1>task1 9</h1>';

/**
 *
 * 9. write a function to calculate the even numbers until the given number.
 *
 * desc the even number give 0 as a result for num%2
 * @param int $num
 */
function calEventNum(int $num){

    $result = 0 ;

    for ($i=1 ,$ii = $num ; $i <= $ii ; $i++){
        if ($i%2 == 0){
         $result++;
        }
    }
    return $result;
}

var_dump(calEventNum(6)); // there are three of even number in 6 (2 - 4 - 6)

/* ***      task1  10   *********    */

echo '<h1>task1 10</h1>';

function randValueArray(array $array){
    if (!empty($array)){
        $len = count($array) - 1;
        $randnum = rand(0 , $len);
        return $array[$randnum];
    }
}

var_dump(randValueArray(['ahmed' , 'islam' , 'mohamed' , 'wael' , 'omaer' , 12 , 45 , 28]));