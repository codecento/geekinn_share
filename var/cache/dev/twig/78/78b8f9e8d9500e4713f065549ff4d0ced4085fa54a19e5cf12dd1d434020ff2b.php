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

/* default/index.html.twig */
class __TwigTemplate_e1a255196c3cc8aacde1d736367959084818f08f10a15d59714a1bcc1385bb7d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'contenido' => [$this, 'block_contenido'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $this->parent = $this->loadTemplate("frontend.html.twig", "default/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_contenido($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contenido"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contenido"));

        // line 4
        echo "\t<div class=\"form-group p-3 elemento text-light\">
\t\t<label for=\"tittle\">Elige videojuego:
\t\t</label>
\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Elige videojuego...\"></input>
\t<label class=\"mt-2\" for=\"comment\">Comparte algo:</label>
\t<textarea class=\"form-control\" rows=\"4\" placeholder=\"¿Algunos mods? ¿Tal vez una guía de trofeos?\"></textarea>
\t<button type=\"submit\" class=\"btn btn-light mt-3 ml-auto\">Publicar</button>
</div>
";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 13
            echo "\t<div class=\"card post text-light elemento\">
\t\t<div class=\"card-body\">
\t\t\t<h6 class=\"card-title\">";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "usuario", []), "nombre", []), "html", null, true);
            echo "</h5>
\t\t\t<h6 class=\"card-subtitle mb-2 text-muted\">Hablando de: ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "videojuego", []), "nombre", []), "html", null, true);
            echo " <span class=\"ml-auto\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["post"], "fechaCreacion", [])), "html", null, true);
            echo "</span></h6>
\t\t\t<p class=\"card-text\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "texto", []), "html", null, true);
            echo "</p>
\t\t\t<a href=\"#\" class=\"card-link btn btn-light\">Reportar</a>
\t\t\t<a href=\"#\" class=\"card-link btn btn-light\">Comentar</a>
\t\t</div>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 17,  82 => 16,  78 => 15,  74 => 13,  70 => 12,  60 => 4,  51 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'frontend.html.twig' %}

{% block contenido %}
\t<div class=\"form-group p-3 elemento text-light\">
\t\t<label for=\"tittle\">Elige videojuego:
\t\t</label>
\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Elige videojuego...\"></input>
\t<label class=\"mt-2\" for=\"comment\">Comparte algo:</label>
\t<textarea class=\"form-control\" rows=\"4\" placeholder=\"¿Algunos mods? ¿Tal vez una guía de trofeos?\"></textarea>
\t<button type=\"submit\" class=\"btn btn-light mt-3 ml-auto\">Publicar</button>
</div>
{% for post in posts %}
\t<div class=\"card post text-light elemento\">
\t\t<div class=\"card-body\">
\t\t\t<h6 class=\"card-title\">{{ post.usuario.nombre }}</h5>
\t\t\t<h6 class=\"card-subtitle mb-2 text-muted\">Hablando de: {{ post.videojuego.nombre }} <span class=\"ml-auto\">{{post.fechaCreacion|date}}</span></h6>
\t\t\t<p class=\"card-text\">{{ post.texto }}</p>
\t\t\t<a href=\"#\" class=\"card-link btn btn-light\">Reportar</a>
\t\t\t<a href=\"#\" class=\"card-link btn btn-light\">Comentar</a>
\t\t</div>
\t</div>
{% endfor %}
{% endblock %}
", "default/index.html.twig", "C:\\xampp\\htdocs\\geekinn_share\\app\\Resources\\views\\default\\index.html.twig");
    }
}
