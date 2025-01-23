```php
<?php
function increment_array_value(&$arr, $key) {
  if (!isset($arr[$key])) {
    $arr[$key] = 0; 
  }
  $arr[$key]++;
}

$my_array = [];
increment_array_value($my_array, 'a');
echo $my_array['a']; // Output: 1

// The subtle bug is that if you pass a non-existing key into increment_array_value function,
// PHP will implicitly create a new entry with a value of 0, then increment it.  
// It works as intended only when the key already exists.

increment_array_value($my_array, 'b');
echo $my_array['b']; // Output: 1

// However, if you do this:
$another_array = ['a'=>1];
increment_array_value($another_array, 1);
//There's no error, but it adds a new element to the array with index 1 instead of incrementing existing element with key 'a'.
//Expected that only a['a'] should be incremented but it will add a new element with a key of 1
//This demonstrates unexpected behavior that the function doesn't check if the given key is of the correct type. 
//The key should be string for the intended behavior.
print_r($another_array);
//Output: Array ( [a] => 1 [1] => 1 ) 

?>
```