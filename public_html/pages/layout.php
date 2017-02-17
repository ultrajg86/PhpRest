<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Moderna - Bootstrap 3 flat corporate template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://bootstraptaste.com" />
    <!-- css -->
    <link href="{{ base_url }}css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ base_url }}css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ base_url }}css/jcarousel.css" rel="stylesheet" />
    <link href="{{ base_url }}css/flexslider.css" rel="stylesheet" />
    <link href="{{ base_url }}css/style.css" rel="stylesheet" />

    <!-- Theme skin -->
    <link href="{{ base_url }}skins/default.css" rel="stylesheet" />

    <!-- =======================================================
        Theme Name: Moderna
        Theme URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>
<body>

{{ baseUrl }}

<div id="wrapper">
    {% include "layout_header.php" %}
    {% block body %}{% endblock %}
    {% include "layout_footer.php" %}
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ base_url }}js/jquery.js"></script>
<script src="{{ base_url }}js/jquery.easing.1.3.js"></script>
<script src="{{ base_url }}js/bootstrap.min.js"></script>
<script src="{{ base_url }}js/jquery.fancybox.pack.js"></script>
<script src="{{ base_url }}js/jquery.fancybox-media.js"></script>
<script src="{{ base_url }}js/google-code-prettify/prettify.js"></script>
<script src="{{ base_url }}js/portfolio/jquery.quicksand.js"></script>
<script src="{{ base_url }}js/portfolio/setting.js"></script>
<script src="{{ base_url }}js/jquery.flexslider.js"></script>
<script src="{{ base_url }}js/animate.js"></script>
<script src="{{ base_url }}js/custom.js"></script>

</body>
</html>