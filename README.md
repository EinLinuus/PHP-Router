# PHP Router
Simple but powerful PHP Router

1. [Requirements](#requirements)
1. [Installation](#installation)
1. [Usage](#usage)
1. [Specific Methods](#specific-methods)
1. [CatchAll Routes](#catchall-routes)
1. [Directories](#directories)
1. [Support](#support)
1. [How to update](#how-to-update)
1. [Versions](#versions)

# Requirements
* PHP 5 (7 is recommended)
* 1 MB free disk space
* Apache2 WebServer
* .htaccess files enabled

# Installation
**1.** Put the files in your website directory.

**2.** Update the .htaccess. Open the file, the comment explains how.

**3.** Put the same path you put in the .htacces in `$baseurl` in `index.php`.

**4.** That's it! Now open up your page in the browser and you should see something :D
  
# Usage

### Create a new page:

**1.** Include a new file in `/router-pages/init.php`:
```php
/**
 * Page "/mypage/"
 */
require_once __DIR__ . '/page-mypage.php';
```

**2.** Create the new file in `/router/page-mypage.php`.

**3.** Register the route:
```php
$router->registerRoute(
    (new Route('/mypage/'))->setHandler('page_mypage')
);
```

**4.** Create the function that should be called if the user opens the page:
```php
function page_mypage( $route, $data ){

    // Do some PHP Stuff here

    $a = 1;
    $b = 2;
    $c = $a + $b;


    // Print something out

    echo <<< HTML

    <p>
        Hello and welcome on my wonderful page!
    </p>

    <p>
        Here is a PHP variable: $c
    </p>

    HTML;

}
```

# Specific Methods
Example: You have a login screen with a simple form. Now you can have one function for the form and one for the backend stuff to collect the data and do whatever you want.

If you create a route, you can specify the accepted methods:

|Route method|Request method|
|-|-|
|`POST`|Post-Request|
|`GET`|Get-Request|
|`*`|Post- and Get-Request|

Just use `setMethod( /* Method */ )` when you create your route.

> By default the accepted methods are set to `*`

Example:
```php
$router->registerRoute(
    (new Route('/login/'))->setMethod('GET')->setHandler('page_login_get')
);
$router->registerRoute(
    (new Route('/login/'))->setMethod('POST')->setHandler('page_login_post')
);

function page_login_get( $route, $data ) {
    echo "This is a get request!";
}
function page_login_post( $route, $data ) {
    echo "This is a post request!";
}
```

# CatchAll Routes
### What is a CatchAll Route?

It simply catches all page requests that have the route as parent.<br>
For example:

If the CatchAll Route is `/profile/`, the route catches all requests with `/profile/`:<br>
- `/profile/user1`
- `/profile/user1/posts/`
- `/profile/`
- `/profile/edit/`


><br>
> Note: You can put a normal route inside a catchall route. If there is a route exact for the requested url, it's prioritised.<br>
><br>

### How do i create one?

Just change your route registration:
```php
$router->registerRoute(
    (new Route('/mypage/'))->isCatchAll()->setHandler('page_mypage')
);
```
(Add `isCatchAll()`)

### Get the requested Path

In your page function, you find the requested url in the `$data` Array:

|Variable|Explanation|
|-|-|
|`$data['exact']`|True if the request is exact the route and not catched by catchall|
|`$data['path']`|The requested path after the route|

# Directories

|Directory|Restriction|
|-|-|
|/router-assets|`Allowed` Public folder for CSS, HTML, JavaScript|
|/router-includes|`Deny from all` Router Core|
|/router-pages|`Deny from all` PHP Page-Files|xw

# Support

The Router isn't working? You have Problems or questions regarding the router / my code?

Get in touch with me:
* E-Mail: [support[at]seperax.com](support@seperax.com)
* Twitter: [@EinLinuus](https://twitter.com/EinLinuus)

Or report an issue here:
https://github.com/EinLinuus/PHP-Router/issues

# How to update
If you're upgrading to a newer Version, just download the new files and replace the `/router-includes/` folder
and the `/index.php`.

> Make sure the write no code into the core files!<br>
> Your code should be located in `/router-assets/` and `/router-pages/` or custom created folders.

If any version needs special actions while updating, you'll see it below unter [Versions](#versions).

# Versions

---
### Stable Release 1.0
Every project has a start, here started this project :)