<?php
/**
 * Created by fonseca
 * Date: 04/12/14
 * Time: 13:26
 * Email: diego@cbk.com.br
 */
namespace Controller;

class Carro extends AbstractController
{

    public function getTable()
    {
        return 'carros';
    }

    public function getViewPage()
    {
        return __DIR__.'/../view/carro.php';
    }

    public function getFields()
    {
        return ['nome', 'ano'];
    }
}