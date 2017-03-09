<?php

/**

Problem: (Algorithmic Crush; Hard)
You are given a list of size , initialized with zeroes. You have to perform  operations on the list and output the maximum of final values of all the  elements in the list. For every operation, you are given three integers ,  and  and you have to add value  to all the elements ranging from index  to (both inclusive).

Sample Input:
5 3
1 2 100
2 5 100
3 4 100

Sample Output:
200

Explanation: At first I tried using a loop to fill up the values and sum up everything but the process timed out after 7 test cases.
I knew my loop to fill up the values was wrong but after thinking about it for a while I didn't figure out how to solve this.
It ends up you have to use the prefix sum algorithm. Add the value at the beginning of the index and substract it at the end.
Then you simply need to add each row together and verify for each sum if it's bigger than the max value.

Algorithm used: Prefix sum. O(n) complexity

*/

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$firstLine = explode(" ", readLine($_fp));
$n = $firstLine[0];
$m = $firstLine[1];
$array = [];
$maxValue = 0;
$sum = 0;

for ($i = 1; $i <= $m; $i++) {
    $data = explode(" ", readLine($_fp));
    $a = $data[0];
    $b = $data[1];
    $k = $data[2];
    
    $array[$a] += $k;
    $array[$b+1] -= $k;
}


for ($i = 1; $i <= $n; $i++) {
    $sum += $array[$i];
    if ($sum > $maxValue) {
        $maxValue = $sum;
    }
}

display($maxValue);

closeFile($_fp);

function closeFile($resource)
{
    fclose($resource);
}

function readLine($resource)
{
    return trim(fgets($resource));
}

function display($data, $newLine = true)
{
    fwrite(STDOUT, $data . ($newLine ? PHP_EOL : ''));
}

?>
