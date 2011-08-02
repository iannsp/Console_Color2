<?php
require_once '../src/Console/Color2/Mapper.php';
require_once '../src/Console/Color2/ColorMapper.php';
require_once '../src/Console/Color2/StyleMapper.php';
require_once '../src/Console/Color2/BackgroundMapper.php';
require_once '../src/Console/Color2/Main.php';

echo PEAR2\Console\Color2\Main::convert("%7%YHello %YWor%rld!%n\n");

error_reporting(E_ALL);
// Let's add a little color to the world
// %n resets the color so the following stuff doesn't get messed up
print PEAR2\Console\Color2\Main::convert("%bHello World!%n outro texto \n"); 
// Colorless mode, in case you need to strip colorcodes off a text
print PEAR2\Console\Color2\Main::convert("%rHello World!%n\n", false);
// The uppercase version makes a colorcode bold/bright
print PEAR2\Console\Color2\Main::convert("%BHello World!%n\n");
// To print a %, you use %%
print PEAR2\Console\Color2\Main::convert("3 out of 4 people make up about %r75%% %nof the " 
                            ."world population.\n");
// Or you can use the escape() method.
print PEAR2\Console\Color2\Main::convert("%y"
     .PEAR2\Console\Color2\Main::escape('%4If you feel that you do everying wrong, be random'
                           .', there\'s a 50% Chance of making the right '
                           .'decision.')."%n\n");
