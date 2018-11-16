# typo3-wm_pagepath
Generates Frontend URLs from the Backend in TYPO3

Provides Utility Class to generate Frontend-Urls from Backend Modules.
Based on Extbase + PageType
in contrast to eID of similar Extension https://github.com/smichaelsen/typo3-pagepath

## How to use
To obtain a path call: `$pagepath = Webmatch\WmPagepath\Utility\PagePathUtility::getPagePath($pageId, $parameters);`

$parameters can be a string or array. If it is a string it must start with a `&` character.
So it can look like the following example to call an action of a extension.
```
use Webmatch\WmPagepath\Utility\PagePathUtility;
// ...
$pagepath = PagePathUtility::getPagePath(
    $this->settings['pageUid'],
    [
        'tx_pluginname[action]' => 'sendEmail',
        'tx_pluginname[controller]' => 'EmailSender',
        'tx_pluginname[user]' => $user->getUid()
    ]
);
```

## Contacts

Maintained by Sascha Löffler <lsascha@gmail.com>

Credits to Dmitry Dulepov <dmitry.dulepov@gmail.com> and Sebastian Michaelsen <sebastian@michaelsen.io>
