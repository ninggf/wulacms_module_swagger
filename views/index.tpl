<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{'Api Document'|t} - {$pageMeta.projectName|default:'App'}{$pageMeta.titleSuffix}</title>
    <link rel="stylesheet" type="text/css" href="{'swagger/assets/swagger-ui.css'|res}"/>
    <link rel="icon" type="image/png" href="{'swagger/assets/favicon-32x32.png'|res}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{'swagger/assets/favicon-16x16.png'|res}" sizes="16x16"/>
    <style>
        html {
            box-sizing: border-box;
            overflow: -moz-scrollbars-vertical;
            overflow-y: scroll;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            margin: 0;
            background: #fafafa;
        }
    </style>
</head>
<body>
<div id="swagger-ui"></div>
<script src="{'swagger/assets/swagger-ui-bundle.js'|res}" charset="UTF-8"></script>
<script src="{'swagger/assets/swagger-ui-standalone-preset.js'|res}" charset="UTF-8"></script>
<script>
    window.onload = function () {
        const ui = SwaggerUIBundle({
            urls       : {$apiGp},
            dom_id     : '#swagger-ui',
            deepLinking: true,
            presets    : [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins    : [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout     : "StandaloneLayout",
            //layout      : "BaseLayout",
            filter      : true,
            validatorUrl: null
        });

        window.ui = ui;
    };
</script>
</body>
</html>
