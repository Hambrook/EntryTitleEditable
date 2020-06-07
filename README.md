Entry Title Editable
====================

A Craft CMS extension to remove the entry title field from the field tabs and make the H1 title editable instead.

![Screenshot](https://github.com/hambrook/EntryTitleEditable/raw/master/screenshot.png)

Setup
====================

- Download this repository, rename the folder to 'entrytitleeditable' and upload to craft/plugins directory.

Configuration
====================

You can configure which entry sections have this enabled using either an `ignoresections` or `onlysections` list in `config/entrytitleeditable.php`. For example

    <?php

    return [
        "ignoresections" => [
            "blog", // section handle
            5,      // or section ID
        ],
        "onlysections" => [
        ]
    ];

You only need to specify one list. If there are sections in the `ignoresections` list then any section NOT in the `ignoresections` list will use the plugin. Or if there are sections in the `onlysections` list then ONLY sections in the `onlysections` list will get this feature.

Note: As of 1.1.6 the configuration keys changed to `ignoresections` and `onlysections`.

By default (as of V1.1.2) the default configuration will activate this plugin for all sections.
