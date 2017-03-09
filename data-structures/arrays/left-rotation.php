<?php

/**

Problem: (Left Rotation)
A left rotation operation on an array of size  shifts each of the array's elements  unit to the left. For example, if left rotations are performed on array , then the array would become .

Given an array of  integers and a number, , perform  left rotations on the array. Then print the updated array as a single line of space-separated integers.

Sample Input:
5 4
1 2 3 4 5

Sample Output:
5 1 2 3 4

Explanation:
At first I tried removing the first array element and adding it at the end. That worked fine but one test case out of 10  was failing with timeout.
On Hackerrank you can't see the test cases input/output so I assumed it was because my algorithm was too slow. I was doing a delete
and an insert for every rotation so this would mean O(n*n).

So I thought about how I could enhance this and I figured since the left operations cannot be above the number of array elements
due to the constraint in the test, that I could just split the array where the left operations finish and append the first part to the second.

Algorithm used:
In the end this is using O(1) since the operation will always be constant whatever the number of input.

*/

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$firstLine = explode(" ", readLine($_fp));
$amountOfLeftOperations = $firstLine[1];
$arrayElements = explode(" ", readLine($_fp));

/* take a chunk of the array based on amount of operations and append it at the end of the array */
$chunksToBeMoved = array_chunk($arrayElements, $amountOfLeftOperations);
$arrayElements = [];
for ($i = 1; $i < count($chunksToBeMoved); $i++) {
    $arrayElements = array_merge($arrayElements, $chunksToBeMoved[$i]);
}
$arrayElements = array_merge($arrayElements, $chunksToBeMoved[0]);

/* first solution is too slow for very large data sets 
for ($i = 0; $i < $amountOfLeftOperations; $i++) {
    $firstValue = $arrayElements[0];
    array_shift($arrayElements);
    $arrayElements[] = $firstValue;
}
*/

display(implode(" ", $arrayElements));

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
