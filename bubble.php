<?php
/**
 * Implementation of bubble sort algortihm, generally considered
 * one of the slowest, but most understandable sorting algorithms.
 *
 * @param array $list An array of elements to sort.
 */
function bubbleSort($list) {

	// Get size of list, subtracting 1 because arrays are 0 indexed.
	$size = sizeof($list) - 1;

	do {
		// For each iteration, we reset the $swapped variable.
		// When the entire list has been iterated over, and
		// no swaps have occured, we know the list is sorted
		// and we end there.
		$swapped = false;

		// Loop through each item comparing it to the next item
		// in the list. We us < $size instead of <= $size, because
		// we'd otherwise try to compare the last element to something
		// outisde of the array, which will lead to an out of 
		// bounds error.
		for ($i = 0; $i < $size; $i++) {
			// Get element values
			$current = $list[$i];
			$next = $list[$i + 1];

			// Swap if out of order. Change to > if you want descending
			if ($next < $current) {
				$list[$i + 1] = $current;
				$list[$i] = $next;

				// Set flag indicating a swap has been made
				$swapped = true;
			}
		}
	} while ($swapped);

	return $list;
}

$x = [1, 8, 7, 2, 10, -8, 39, 12];
print_r(bubbleSort($x));

