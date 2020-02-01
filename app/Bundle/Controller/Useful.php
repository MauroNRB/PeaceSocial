<?php

namespace app\Bundle\Controller;

/**
 * @author Mauro Ribeiro
 * @since 2020-02-01
 */
class Useful
{
    public function alert($msg, $route)
    {
        echo "
            <head>
                <link rel='stylesheet/less' type='text/css' href='../View/css/style.less' />
                <script src='//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js' ></script>
            </head>
            <body id='load-msg'>
                <div class='loader'></div>
            </body>
            <script language='javascript' type='text/javascript'>
                setTimeout(function(){ 
                    alert('$msg');
                    window.location.href= '$route';
                }, 1000);
            </script>
        ";
    }
}