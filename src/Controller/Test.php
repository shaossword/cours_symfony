<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Test
 * @package App\Controller
 */
class Test extends AbstractController
{
    /**
     * @Route("test/hello/{theme}", name="test_hello")
     * @return Response
     */
    function maPageDeTest($theme, Request $request)
    {
        $response = new Response();

        $content = "<html><body><h1 style='color: red'>hello world</h1><p>lorem</p><div><ul><li>bob</li><li>est</li><li>mort</li></ul>Theme = $theme</div></body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        $this->render();

        return $response;
    }
}
