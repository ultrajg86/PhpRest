
{% set npath = currentPath|split('/') %}

<!-- start header -->
<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span>M</span>oderna</a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li {{ (npath[1] == "") ? "class='active'" : "" }}><a href="/">Home</a></li>
                    <li {{ (npath[1] == "notices") ? "class='active'" : "" }}><a href="{{ base_url }}/notices">Notice</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="components.html">Components</a></li>
                            <li><a href="pricingbox.html">Pricing box</a></li>
                        </ul>
                    </li>
                    <li {{ (npath[1] == "portfolio") ? "class='active'" : "" }}><a href="{{ base_url }}/portfolio">Portfolio</a></li>
                    <li {{ (npath[1] == "blog") ? "class='active'" : "" }}><a href="{{ base_url }}/blog">Blog</a></li>
                    <li {{ (npath[1] == "contact") ? "class='active'" : "" }}><a href="{{ base_url }}/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

{{ npath[1] }}

{% if type != "main" %}
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{ base_url }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    {% if npath[1] == "notices" %}
                    <li class="active">Notice</li>
                    {% elseif npath[1] == "portfolio" %}
                    <li class="active">portfolio</li>
                    {% elseif npath[1] == "contact" %}
                    <li class="active">contact</li>
                    {% elseif npath[1] == "blog" %}
                    <li class="active">Blog</li>
                    {% endif %}
                </ul>
            </div>
        </div>
    </div>
</section>
{% endif %}