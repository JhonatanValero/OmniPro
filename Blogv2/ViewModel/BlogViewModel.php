<?php
namespace OmniPro\Blogv2\ViewModel;

/**
 * Usados para procesos independientes o adicionar funciones
 */

class BlogViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    public function __construct()
    {
        
    }

    public function getInfo()
    {
        return 'Descripcion Modulo';
    }
}
