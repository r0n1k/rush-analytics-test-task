# Test task

This program outputs numbers from 0 to 50.
In case if the number is divisible by 5, the program outputs "да".
In case if the number is divisible by 7, the program outputs "нет".
In case if the number is divisible by 5 and 7, the program outputs "данет".
Otherwise, the program outputs the number.

## How to run:

`php main.php`

or 

`php main.php -s 0` to run solution with index 0

Read help to get info regarding available solutions.

### Help:

```
Usage: php main.php [--solution=<solution>|-s <solution>] [--test|-t] [--performance-test|-p] [--help]
Options:
  --solution=<solution> | -s <solution>
   Chose the solution to run. Possible values: 0, 1
     0. Solution based on chain of responsibility pattern
     1. Regular solution based on a loop

   --test | -t Run tests
   
   --performance-test | -p Run performance tests
   
  --help | -h - get this help
```

> You can also run tests or performance tests by running the following commands:
> 
> `php main.php --test`
> 
> `php main.php --performance-test`

## Project structure

`App.php` is the main class which responsive to handle cli arguments run the solution and tests.

`Helpers` contains some helper classes which are used by App class

`Solutions` contains all solutions classes and their related classes. 
App searches for the solution classes in this folder. Solution classes must have name ending with Solution. 
For example `RegularSolution`. No one class else should have the name like this but solutions.