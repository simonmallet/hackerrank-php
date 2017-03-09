<?php

/**

Problem: (Sparse Arrays)
There are  strings. Each string's length is no more than  characters. There are also  queries. For each query, you are given a string, and you need to find out how many times this string occurred previously.

Sample Input:
4
aba
baba
aba
xzxb
3
aba
xzxb
ab

Sample Output:
2
1
0

Explanation of solution:
I read the number of strings from the first line and then loop that many times to store those strings inside a Hash Table.
The index is the string itself with a default value of 1 if it doesn't already exist in the hash otherwise simply increment its value by 1.

Then I read how many queries are to be executed.
For each query, all there is to do is verify if the index exists: if it does, output it's value on a line, otherwise display 0.

Algorithm used:
Hash Table has a O(1) complexity (constant) in this case since we are accessing it by index which makes it the fastest algorithm possible.
Another solution which would have been slower would have been to store all strings in an array and then for every query loop through the array and count how many
occurrences there are. This would have been O(n) complexity since we have to go through all strings for every query.
*/

$_fp = fopen("php://stdin", "r");

// Populate Strings in HashTable
$strings = [];
$stringsNumber = readLine($_fp);

for ($i = 0; $i < $stringsNumber; $i++) {
    $currentString = readLine($_fp);
    if (!isset($strings[$currentString])) {
        $strings[$currentString] = 1;
    } else {
        $strings[$currentString]++;
    }
}

// Execute queries
$queriesAmount = readLine($_fp);
for ($i = 0; $i < $queriesAmount; $i++) {
    $currentString = readLine($_fp);
    if (!isset($strings[$currentString])) {
        display("0");
    } else {
        display($strings[$currentString]);
    }
}

closingFile($_fp);

function closingFile($resource)
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
