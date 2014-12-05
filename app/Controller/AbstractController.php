<?php
/**
 * Created by fonseca
 * Date: 04/12/14
 * Time: 13:26
 * Email: diego@cbk.com.br
 */
namespace Controller;

abstract class AbstractController extends ControllerDAO
{
    public function index($get, $post)
    {
        if (!empty($get['novo'])) {
            include __DIR__ . '/../view/' . $this->getTable() . '/criar.php';
        } elseif (!empty($get['editar'])) {
            $dado = $this->buscar($get['id']);
            include __DIR__ . '/../view/' . $this->getTable() . '/editar.php';
        } else if (!empty($get['excluir'])) {
            $this->excluir($get['id']);
            $this->inicio();
        } else if (!empty($post)) {
            if (!empty($post['acao']) && $post['acao'] == 'editar')
                $this->editar($post);
            else
                $this->salvar($post);
            $this->inicio();
        } else {
            $this->inicio();
        }
    }

    private function inicio()
    {
        $dados = $this->listar();
        include __DIR__ . '/../view/' . $this->getTable() . '/index.php';
    }

}