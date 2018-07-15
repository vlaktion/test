<?php

function render_strings(array $words, $count)
{
    for($i = 0; $i < $count; $i++)
    {	
    	shuffle( $words );
    	yield implode(' ', $words);
    }
}

function get_uniques($strings, $count)
{
    $uniques = array();
    $max_combination = factorial($count);
    foreach ($strings as $value)
    {
    	if( !in_array($value, $uniques) )
    	{
    		$uniques[] = $value;
    		if( count($uniques) >= $max_combination )
    		{
    			break;
    		}
    	}
    }
    return $uniques;
}

function factorial($n){
	$factorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

$words = ['red', 'green', 'yellow', 'blue', 'orange'];

$t = microtime(true);
$strings = render_strings($words, 10000000);
echo "T = ".(microtime(true) - $t)."\n";

$t = microtime(true);
$uniques = get_uniques($strings, count($words));
echo "T = ".(microtime(true) - $t)."\n";
print_r($uniques);