<?php

/**
 * Utilities
 * 
 * @author Linus Benkner
 */

/**
 * Check if string starts with specific string
 * @since 1.0
 */
function startsWith($haystack, $needle):bool {
    return (substr($haystack, 0, strlen($needle)) === $needle);
}

/**
 * Check if string ends with specific string
 * @since 1.0
 */
function endsWith($haystack, $needle):bool {
    return (substr($haystack, -(strlen($needle)), strlen($needle)) === $needle);
}

/**
 * Get amount of same chars from beginning
 * @since 1.0
 */
function getSameCharAmount($haystack, $compare):int {
    $count = 0;
    for($i = 0; $i<strlen($haystack); $i++){
        if($haystack[$i] === $compare[$i]){
            $count++;
        }else {
        break;
        }
    }
    return $count;
}

/**
 * Remove the first chars if they are equal to the given string
 * @since 1.0
 */
function removeFirstChars($haystack, $removal):string {
    if(startsWith($haystack, $removal)){
        $haystack = substr($haystack, strlen($removal));
    }
    return $haystack;
}   