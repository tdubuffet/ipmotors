<?php

/* IPMotorsHomeBundle:Home:index.html.twig */
class __TwigTemplate_487d12144c00b211ba7d29de27c0701c18bce04bf18000033b879b1ca484c3de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"page-header\" id=\"banner\">
        <div class=\"row\">
            <div class=\"col-lg-6\">
                <div class=\"well sponsor\">
                    <h1>Clients</h1>
                    <p>Ut rhoncus justo mauris, vulputate elementum elit pulvinar eget.</p>
                    <button type=\"button\" class=\"btn btn-primary btn-lg\">Large button</button>
                </div>
            </div>
            
            <div class=\"col-lg-6\">
                <div class=\"well sponsor\">
                    <h1>Marketing</h1>
                    <p>Ut rhoncus justo mauris, vulputate elementum elit pulvinar eget.</p>
                    <button type=\"button\" class=\"btn btn-primary btn-lg\">Large button</button>
                </div>
            </div>
        </div>
        
        
        <div class=\"row\">
            <div class=\"col-lg-6\">
                <div class=\"well sponsor\">
                    <h1>Edition formulaire</h1>
                    <p>Ut rhoncus justo mauris, vulputate elementum elit pulvinar eget.</p>
                    <button type=\"button\" class=\"btn btn-primary btn-lg\">Large button</button>
                </div>
            </div>
            
            <div class=\"col-lg-6\">
                <div class=\"well sponsor\">
                    <h1>Utilisateurs</h1>
                    <p>Ut rhoncus justo mauris, vulputate elementum elit pulvinar eget.</p>
                    <button type=\"button\" class=\"btn btn-primary btn-lg\">Large button</button>
                </div>
            </div>
        </div>
    </div>



";
    }

    public function getTemplateName()
    {
        return "IPMotorsHomeBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
