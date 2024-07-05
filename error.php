<?php

$apiKey = $_SERVER['GIPHY_API_KEY'] ?? '';

$error  =  $_GET['err']    ?? null;
$tag    =  $_GET['tag']    ?? 'nope';
$rating =  $_GET['rating'] ?? $_SERVER['GIPHY_RATING'] ?? 'g';
$theme  =  $_GET['theme']  ?? $_SERVER['ERROR_THEME'] ?? 'light';

switch ($theme) {
    case 'dark':
        $backgroundColor = '#000';
        $color           = '#FFF';
        $creditImg       = 'data:image/png;base64,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';
        break;

    case 'light':
    default:
        $backgroundColor = '#FFF';
        $color           = '#000';
        $creditImg       = 'data:image/png;base64,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';
}

class Giphy {

    private $apiKey;

    private $urlFormat = 'https://api.giphy.com/v1/gifs/random?api_key=%s&tag=%s&rating=%s';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getRandomGif(string $tag, string $rating = 'g')
    {
        if (!$this->apiKey) {
            return null;
        }

        $curl = curl_init(sprintf($this->urlFormat, $this->apiKey, $tag, $rating));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($curl);
        curl_close($curl);

        if (empty($return)) {
            return null;
        }

        $result = json_decode($return, true);

        $imgUrl = $result['data']['images']['original']['url'] ?? null;

        return $imgUrl
            ? substr($imgUrl, strpos($imgUrl, '/')) // strip protocol
            : null;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $error ?></title>
    <meta charset='utf-8'>
    <style type="text/css">
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 1em;
            background-color: <?= $backgroundColor ?>;
            color: <?= $color ?>;
        }
        h1 {
            margin: 1em auto 2em;
        }
        pre {
            font-size: 2rem;
        }
        footer {
            position: absolute;
            bottom: 1em;
            right: 1em;
        }
    </style>
</head>
<body>

<h1><?= $error ?></h1>

<?php if ($imgUrl = (new Giphy($apiKey))->getRandomGif($tag, $rating)): ?>
    <img src="<?= $imgUrl ?>" alt="nope!"/>
<?php else: ?>
    <pre>¯\_(ツ)_/¯</pre>
<?php endif ?>

<footer>
    <a href="http://giphy.com" target="_blank" rel="noopener noreferrer">
        <img src="<?= $creditImg ?>" alt="Powered by Giphy" />
    </a>
</footer>

</body>
</html>
