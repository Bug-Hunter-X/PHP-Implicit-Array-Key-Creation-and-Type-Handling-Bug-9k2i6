```php
<?php
function increment_array_value(&$arr, $key) {
  //Check if the key is string and exists
  if (is_string($key) && isset($arr[$key])) {
    $arr[$key]++;
  } else {
    //Handle the error, throw exception or return an error message. 
    trigger_error("Invalid key type or key does not exist", E_USER_WARNING);
  }
}

$my_array = [];
increment_array_value($my_array, 'a');
echo $my_array['a']; // Output: 1

$another_array = ['a'=>1];
//Will throw a warning
increment_array_value($another_array, 1);
print_r($another_array);
// Output: Array ( [a] => 1 ) 

?>
```