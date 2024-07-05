# RandomGifErrorPage

Simple single-file PHP error page with random Gif fetched from Giphy.

https://giphy.com/

# Usage

`error.php?err=404+Not+Found`

`error.php?err=500+Internal+Server+Error&theme=dark&tag=wtf`


## Nginx sample configuration

* `/etc/nginx/sites-available/my-site.conf`

```nginx
# ...

set $errorTheme light;
set $giphyApiKey "***change*me***";
set $giphyRating r;

include custom-errors.conf;

# ...
```

* `/etc/nginx/custom-errors.conf`

```nginx
error_page 403 /RandomGifErrorPage/error.php?err=403+Forbidden;
error_page 404 /RandomGifErrorPage/error.php?err=404+Not+Found;

error_page 500 /RandomGifErrorPage/error.php?err=500+Internal+Server+Error;
error_page 502 /RandomGifErrorPage/error.php?err=502+Bad+Gateway;
error_page 503 /RandomGifErrorPage/error.php?err=503+Service+Unavailable;
error_page 504 /RandomGifErrorPage/error.php?err=504+Gateway+Time-out;

location ^~ /RandomGifErrorPage/error.php {

    root /path/to/container;

    fastcgi_split_path_info ^(.+\.php)(/.+)\$;
    fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
    fastcgi_index error.php;
    include fastcgi_params;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    
    fastcgi_param ERROR_THEME $errorTheme;
    fastcgi_param GIPHY_API_KEY $giphyApiKey;
    fastcgi_param GIPHY_RATING $giphyRating;
}
```


## Apache sample configuration

* `/etc/apache2/httpd.conf`

```ApacheConf
Alias "/RandomGifErrorPage" "/path/to/RandomGifErrorPage"

ErrorDocument 403 /RandomGifErrorPage/error.php?err=403+Forbidden
ErrorDocument 404 /RandomGifErrorPage/error.php?err=404+Not+Found

ErrorDocument 500 /RandomGifErrorPage/error.php?err=500+Internal+Server+Error
ErrorDocument 502 /RandomGifErrorPage/error.php?err=502+Bad+Gateway
ErrorDocument 503 /RandomGifErrorPage/error.php?err=503+Service+Unavailable
ErrorDocument 504 /RandomGifErrorPage/error.php?err=504+Gateway+Time-out
```
