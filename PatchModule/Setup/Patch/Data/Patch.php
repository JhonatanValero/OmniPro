<?php
namespace OmniPro\PatchModule\Setup\Patch\Data;

class Patch implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    /** 
     * @var ModuleDataSetupInterface 
    */
   private $moduleDataSetup;

   /**
    * @var EavSetupFactory 
    */
   private $eavSetupFactory;


    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function apply()
    {
        /** @var EavSetup $eavSetup */
       $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

       $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'enable_color', [
           'type' => 'int',
           'backend' => '',
           'frontend' => '',
           'label' => 'Enable Color',
           'input' => 'select',
           'class' => '',
           'source' => \Magento\Catalog\Model\Product\Attribute\Source\Boolean::class,
           'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
           'visible' => true,
           'required' => true,
           'user_defined' => false,
           'default' => '',
           'searchable' => false,
           'filterable' => false,
           'comparable' => false,
           'visible_on_front' => false,
           'used_in_product_listing' => true,
           'unique' => false,
       ]);
    }

    public function getAliases()
    {
        return [];
    }

    public static function getDependencies()
    {
        return [];
    }
}
