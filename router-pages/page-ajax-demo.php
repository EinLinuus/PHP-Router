<?php

/**
 * Router Page
 * Route: "/ajax/"
 * 
 * @author Linus Benkner
 */

$router->registerRoute(
    (new Route('/ajax/demo/'))->setHandler('page_ajaxdemo')
);

function page_ajaxdemo( $route, $data ){

    $baseurl = getBaseURL();

    echo <<< HTML

    <html>
        <body>
            <center>
            
                <h1>Path /ajax/demo/</h1>
                
                <hr>

                <p>The content below is loaded with AJAX:</p>

                <button id="loadAjax">Load</button>

                <div id="ajax"></div>

            </center>
        </body>
    </html>

    <script src="$baseurl/router-assets/pro.js"></script>
    <script src="$baseurl/router-assets/main.js"></script>

    HTML;

}