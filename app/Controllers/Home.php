<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='Inicio | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('Original');
        echo view ('front/footer_view');
    } 

    public function contacto()
    {
        $data['titulo']='Contacto | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/contacto');
        echo view ('front/footer_view');
    } 

    public function acerca_de()
    {
        $data['titulo']='¿Quienes Somos? | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/acerca_de');
        echo view ('front/footer_view');
    } 

    public function tienda_view()
    {
        $data['titulo']='Tienda | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/tienda_view');
        echo view ('front/footer_view');
    } 

    public function terminos()
    {
        $data['titulo']='Terminos y Condiciones | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/terminos');
        echo view ('front/footer_view');
    } 

    public function comercializacion()
    {
        $data['titulo']='Comercializacion | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/comercializacion');
        echo view ('front/footer_view');
    } 

}
