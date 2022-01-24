Measure
=====================

A simple package for measuring the time spent on script execution. Also to measure the memory spent.

Install
-----------------------------------

Run:
```php
    composer require --dev adiafora/measure
```

Usage
-----------------------------------

### Usage facade

First you need to call the timeStart() method.

```php
    timeStart();
```

From this moment, the countdown of time and memory spent will begin.
Next, you can call the timeDump() or timeDd() method anywhere in your application.

```php
    timeDump();
    // or
    timeDd();
```
You can continue to call one of the information output methods. You can also restart the counter by calling the timeStart() method.

License
-----------------------------------

The MIT License (MIT). Please see License File for more information.