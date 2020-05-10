<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* frontend.html.twig */
class __TwigTemplate_dad6c52993e56085fdcca5cd8b3dde86be1a7268bdad9a660d03664f3532e0dc extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'contenido' => [$this, 'block_contenido'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "frontend.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "frontend.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<header>
\t\t";
        // line 8
        echo "\t\t<nav
\t\t\tid=\"main-nav\" class=\"navbar navbar-dark navbar-expand-sm\">
\t\t\t";
        // line 11
        echo "\t\t\t<a class=\"navbar-brand\" href=\"#\">
\t\t\t\t<img class=\"rounded-circle\" src=\"geekicon.png\" width=\"30\" height=\"30\" alt=\"logo\">
\t\t\t\tGeekinn Share
\t\t\t</a>
\t\t\t";
        // line 16
        echo "\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbar-list-4\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t</button>
\t\t\t";
        // line 20
        echo "\t\t\t<div
\t\t\t\tclass=\"collapse navbar-collapse ml-auto\" id=\"navbar-list-4\">
\t\t\t\t";
        // line 23
        echo "\t\t\t\t<ul class=\"navbar-nav mr-auto\">
\t\t\t\t\t<li class=\"nav-item active\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Inicio
\t\t\t\t\t\t\t<span class=\"sr-only\">(current)</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Videojuegos
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Popular</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Premium</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t<ul class=\"navbar-nav nav-flex-icons\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link waves-effect waves-light\">
\t\t\t\t\t\t\t<svg class=\"bi bi-bell\" width=\"1em\" height=\"1em\" viewbox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t\t\t\t<path d=\"M8 16a2 2 0 002-2H6a2 2 0 002 2z\"/>
\t\t\t\t\t\t\t\t<path fill-rule=\"evenodd\" d=\"M8 1.918l-.797.161A4.002 4.002 0 004 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 00-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 111.99 0A5.002 5.002 0 0113 6c0 .88.32 4.2 1.22 6z\" clip-rule=\"evenodd\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t<li class=\"nav-item dropdown\">
\t\t\t\t\t\t<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t<img src=\"https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg\" width=\"30\" height=\"30\" class=\"rounded-circle\">
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdownMenuLink\">

\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">Paneles</a>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">Perfil</a>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">Cerrar sesión</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</nav>
\t</header>
\t<main class=\"container \">
\t\t<div
\t\t\tclass=\"row\">
\t\t\t";
        // line 70
        echo "\t\t\t<div id=\"contenido\" class=\"col-7 offset-1\">
\t\t\t\t";
        // line 71
        $this->displayBlock('contenido', $context, $blocks);
        // line 72
        echo "\t\t\t</div>
\t\t\t<aside id=\"contenido-lateral\" class=\"col-3 text-light d-flex flex-column\">
\t\t\t\t
\t\t\t\t\t";
        // line 76
        echo "\t\t\t\t\t<div class=\"ml-auto mr-5 input-group input-group-sm\">
\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t<span class=\"input-group-text\" id=\"inputGroup-sizing-sm\">
\t\t\t\t\t\t\t\t<svg class=\"bi bi-search\" width=\"1em\" height=\"1em\" viewbox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t\t\t\t\t<path fill-rule=\"evenodd\" d=\"M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z\" clip-rule=\"evenodd\"/>
\t\t\t\t\t\t\t\t\t<path fill-rule=\"evenodd\" d=\"M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z\" clip-rule=\"evenodd\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Busca posts, usuarios...\" aria-label=\"Small\" aria-describedby=\"inputGroup-sizing-sm\">
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 89
        echo "\t\t\t\t\t<footer class=\"elemento\">
\t\t\t\t\t\t<nav class=\"nav flex-column text-center\">
\t\t\t\t\t\t\t<a class=\"nav-link text-light\" href=\"\">Términos y Condiciones</a>
\t\t\t\t\t\t\t<a class=\"nav-link text-light\" href=\"\">Privacidad</a>
\t\t\t\t\t\t\t<a class=\"nav-link text-light\" href=\"\">©Copyright 2020 - Vicente Palacios Barrera</a>
\t\t\t\t\t\t</nav>

\t\t\t</aside>
\t\t</div>
\t</main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 71
    public function block_contenido($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contenido"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contenido"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "frontend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 71,  178 => 89,  164 => 76,  159 => 72,  157 => 71,  154 => 70,  106 => 23,  102 => 20,  97 => 16,  91 => 11,  87 => 8,  84 => 6,  75 => 5,  62 => 3,  53 => 2,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('css/style.css') }}\"/>
{% endblock %}
{% block body %}
\t<header>
\t\t{# Encabezado con menú de navegación responsivo mediante Bootstrap #}
\t\t<nav
\t\t\tid=\"main-nav\" class=\"navbar navbar-dark navbar-expand-sm\">
\t\t\t{# Logo y nombre de la web #}
\t\t\t<a class=\"navbar-brand\" href=\"#\">
\t\t\t\t<img class=\"rounded-circle\" src=\"geekicon.png\" width=\"30\" height=\"30\" alt=\"logo\">
\t\t\t\tGeekinn Share
\t\t\t</a>
\t\t\t{# Botón oculto que se activará cuando el tamaño para tablets y smartphones se alcance #}
\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbar-list-4\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t</button>
\t\t\t{# Menú que se colapsará #}
\t\t\t<div
\t\t\t\tclass=\"collapse navbar-collapse ml-auto\" id=\"navbar-list-4\">
\t\t\t\t{# Enlaces a páginas de la web #}
\t\t\t\t<ul class=\"navbar-nav mr-auto\">
\t\t\t\t\t<li class=\"nav-item active\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Inicio
\t\t\t\t\t\t\t<span class=\"sr-only\">(current)</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Videojuegos
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Popular</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Premium</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t<ul class=\"navbar-nav nav-flex-icons\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link waves-effect waves-light\">
\t\t\t\t\t\t\t<svg class=\"bi bi-bell\" width=\"1em\" height=\"1em\" viewbox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t\t\t\t<path d=\"M8 16a2 2 0 002-2H6a2 2 0 002 2z\"/>
\t\t\t\t\t\t\t\t<path fill-rule=\"evenodd\" d=\"M8 1.918l-.797.161A4.002 4.002 0 004 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 00-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 111.99 0A5.002 5.002 0 0113 6c0 .88.32 4.2 1.22 6z\" clip-rule=\"evenodd\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t<li class=\"nav-item dropdown\">
\t\t\t\t\t\t<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t<img src=\"https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg\" width=\"30\" height=\"30\" class=\"rounded-circle\">
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdownMenuLink\">

\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">Paneles</a>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">Perfil</a>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">Cerrar sesión</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</nav>
\t</header>
\t<main class=\"container \">
\t\t<div
\t\t\tclass=\"row\">
\t\t\t{# Contenedor para el contenido principal de cada página #}
\t\t\t<div id=\"contenido\" class=\"col-7 offset-1\">
\t\t\t\t{% block contenido %}{% endblock %}
\t\t\t</div>
\t\t\t<aside id=\"contenido-lateral\" class=\"col-3 text-light d-flex flex-column\">
\t\t\t\t
\t\t\t\t\t{# Barra de búsqueda #}
\t\t\t\t\t<div class=\"ml-auto mr-5 input-group input-group-sm\">
\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t<span class=\"input-group-text\" id=\"inputGroup-sizing-sm\">
\t\t\t\t\t\t\t\t<svg class=\"bi bi-search\" width=\"1em\" height=\"1em\" viewbox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t\t\t\t\t<path fill-rule=\"evenodd\" d=\"M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z\" clip-rule=\"evenodd\"/>
\t\t\t\t\t\t\t\t\t<path fill-rule=\"evenodd\" d=\"M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z\" clip-rule=\"evenodd\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Busca posts, usuarios...\" aria-label=\"Small\" aria-describedby=\"inputGroup-sizing-sm\">
\t\t\t\t\t</div>

\t\t\t\t\t{# Footer en el lateral de la página siempre, para que los paneles puedan aparecer de forma infinita #}
\t\t\t\t\t<footer class=\"elemento\">
\t\t\t\t\t\t<nav class=\"nav flex-column text-center\">
\t\t\t\t\t\t\t<a class=\"nav-link text-light\" href=\"\">Términos y Condiciones</a>
\t\t\t\t\t\t\t<a class=\"nav-link text-light\" href=\"\">Privacidad</a>
\t\t\t\t\t\t\t<a class=\"nav-link text-light\" href=\"\">©Copyright 2020 - Vicente Palacios Barrera</a>
\t\t\t\t\t\t</nav>

\t\t\t</aside>
\t\t</div>
\t</main>
{% endblock %}
", "frontend.html.twig", "C:\\xampp\\htdocs\\geekinn_share\\app\\Resources\\views\\frontend.html.twig");
    }
}
