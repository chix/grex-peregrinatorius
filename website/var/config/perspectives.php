<?php 

return [
    "default" => [
        "iconCls" => "pimcore_icon_perspective",
        "elementTree" => [
            [
                "type" => "documents",
                "position" => "left",
                "expanded" => TRUE,
                "hidden" => FALSE,
                "sort" => -3
            ],
            [
                "type" => "assets",
                "position" => "left",
                "expanded" => FALSE,
                "hidden" => FALSE,
                "sort" => -2
            ],
            [
                "type" => "objects",
                "position" => "left",
                "expanded" => FALSE,
                "hidden" => FALSE,
                "sort" => -1
            ]
        ],
        "toolbar" => [
            "file" => [
                "items" => [
                    "searchReplace" => FALSE,
                    "seemode" => FALSE,
                    "help" => FALSE,
                    "about" => FALSE
                ]
            ],
            "extras" => [
                "items" => [
                    "plugins" => FALSE,
                    "backup" => FALSE,
                    "update" => FALSE
                ]
            ]
        ]
    ],
    "editor" => [
        "iconCls" => "pimcore_icon_perspective",
        "toolbar" => [
            "file" => [
                "items" => [
                    "searchReplace" => FALSE,
                    "seemode" => FALSE,
                    "help" => FALSE,
                    "about" => FALSE
                ]
            ],
            "extras" => [
                "items" => [
                    "glossary" => FALSE,
                    "redirects" => FALSE,
                    "plugins" => FALSE,
                    "applicationlog" => FALSE,
                    "backup" => FALSE,
                    "update" => FALSE,
                    "maintenance" => FALSE,
                    "systemtools" => FALSE
                ]
            ],
            "marketing" => [
                "items" => [
                    "tagmanagement" => FALSE,
                    "targeting" => FALSE,
                    "newsletter" => FALSE,
                    "seo" => FALSE
                ]
            ],
            "settings" => [
                "items" => [
                    "customReports" => FALSE,
                    "marketingReports" => FALSE,
                    "documentTypes" => FALSE,
                    "predefinedProperties" => FALSE,
                    "predefinedMetadata" => FALSE,
                    "system" => FALSE,
                    "website" => FALSE,
                    "web2print" => FALSE,
                    "users" => FALSE,
                    "thumbnails" => FALSE,
                    "objects" => FALSE,
                    "routes" => FALSE,
                    "cache" => [
                        "items" => [
                            "clearAll" => FALSE,
                            "clearTemp" => FALSE,
                            "generatePreviews" => FALSE
                        ]
                    ],
                    "adminTranslations" => FALSE,
                    "tagConfiguration" => FALSE
                ]
            ]
        ],
        "elementTree" => [
            [
                "type" => "documents",
                "position" => "left",
                "expanded" => TRUE,
                "hidden" => FALSE,
                "sort" => -3,
                "treeContextMenu" => [
                    "document" => [
                        "items" => [
                            "addPrintPage" => FALSE
                        ]
                    ]
                ],
                "extension" => [
                    "elementRestrictions" => [
                        [
                            "path" => "/",
                            "restrictEmptyPage" => "1",
                            "restrictEmail" => "1",
                            "restrictNewsletter" => "1",
                            "restrictEmptySnippet" => "1",
                            "restrictSnippet" => "1",
                            "restrictHardlink" => "1",
                            "restrictFolder" => "1",
                            "restrictOpen" => "1",
                            "restrictAdvanced" => "1"
                        ],
                        [
                            "path" => "/notifikace",
                            "restrictPage" => TRUE,
                            "restrictLink" => TRUE
                        ]
                    ]
                ]
            ],
            [
                "type" => "assets",
                "position" => "left",
                "expanded" => FALSE,
                "hidden" => FALSE,
                "sort" => -2,
                "extension" => [
                    "elementRestrictions" => [
                        [
                            "path" => "/",
                            "restrictAdvanced" => "1"
                        ]
                    ]
                ]
            ],
            [
                "type" => "objects",
                "position" => "left",
                "expanded" => FALSE,
                "hidden" => TRUE,
                "sort" => -1,
                "extension" => [
                    "elementRestrictions" => [
                        [
                            "path" => "/",
                            "restrictFolder" => "1",
                            "restrictImport" => "1",
                            "restrictAdvanced" => "1"
                        ]
                    ]
                ]
            ]
        ]
    ]
];
