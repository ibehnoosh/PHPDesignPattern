<?php
interface MaterialFormat
{
    public function getContent();
}

class HtmlMaterial implements MaterialFormat
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return "<html>" . $this->content . "</html>";
    }
}

class PdfMaterial implements MaterialFormat
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return "<pdf>" . $this->content . "</pdf>";
    }
}

class HtmlToPdfAdapter implements MaterialFormat
{
    protected $htmlMaterial;

    public function __construct(HtmlMaterial $htmlMaterial)
    {
        $this->htmlMaterial = $htmlMaterial;
    }

    public function getContent()
    {
        return "<pdf>" . $this->htmlMaterial->getContent() . "</pdf>";
    }
}


