Entry Title Editable
====================

A Craft CMS extension to remove the entry title field from the field tabs and make the H1 title editable instead.

![Screenshot](https://github.com/hambrook/EntryTitleEditable/raw/master/screenshot.png)

Setup
====================

- Download this repository, rename the folder to 'entrytitleeditable' and upload to craft/plugins directory.

Configuration
====================

You can configure which entry sections have this enabled using either a blacklist or whitelist in `config/entrytitleeditable.php`. For example

    <?php

    return [
        "blacklist" => [
            "blog", // section handle
            5       // or section ID
        ],
        "whitelist" => [
        ]
    ];

If there are sections in the blacklist, then any section NOT in the blacklist will use the plugin. Or if there are sections in the whitelist, then ONLY sections in the whitelist will get this feature.
