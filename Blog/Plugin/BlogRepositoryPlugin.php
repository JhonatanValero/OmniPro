<?php
namespace OmniPro\Blog\Plugin;

class BlogRepositoryPlugin
{
    public function __construct(
        \Magento\Framework\Api\ImageProcessorInterface $imageProcessor
    )
    {
        $this->imageProccesor = $imageProcessor;
    }

    public function beforeSave(
        \OmniPro\Blog\Api\BlogRepositoryInterface $blogRepositoryInterface,
        \OmniPro\Blog\Api\Data\BlogInterface $blog
    )
    {
        $extension_attributes = $blog->getExtensionAttributes();
        if($extension_attributes)
        {
            $image = $extension_attributes->getImage();
            if($image) 
            {
                $imagePath = $this->imageProcessor->processImageContent('blog/post', $image);
                $blog->setImg($imagePath);
            }
        }
        return [$blog];
    }
}
